from flask import render_template, request, redirect, url_for, session,json,jsonify,abort,flash,make_response,Flask
from flask_mysqldb import MySQL
from datetime import timedelta,datetime
import MySQLdb.cursors

app = Flask(__name__)




app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'design_front_end'
app.config['SECRET_KEY'] = b'6hc/_gsh,./;2ZZx3c6_s,1//'
app.secret_key = 'super secret key'
mysql = MySQL(app)




@app.route('/', methods =['GET', 'POST'])
def login():
    try:
        msg = ''
        if  request.method == 'POST' and 'email' in request.form and 'password' in request.form:
            email= request.form['email']
            password = request.form['password']
            cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            cursor.execute('SELECT * FROM username WHERE email = %s AND password = %s ', (email, password, ))
            account = cursor.fetchone()

            if  email=='admin@admin.com' and password=='admin':
                session.modified=True
                return render_template('index.html')
            
            elif account:
                session['username'] = account['username']
                # default=31 days
                session.modified=True
                return render_template('index.html')
                
            elif not email and not password:
                msg="Harus diisi semua !!!"
            else:
                msg = 'Terjadi kesalahan email atau Password !'
        return render_template('login.html', msg = msg)
    except Exception as e :
        return e
        


@app.route('/register', methods =['GET', 'POST'])
def register():
    try:
        if 	request.method == 'POST' and 'username' in request.form and 'email' in request.form and 'password' in request.form :
            username = request.form['username']
            email = request.form['email']
            password = request.form['password']
            cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            cursor.execute('SELECT * FROM username WHERE email = % s ', (email, ))
            e_mail=cursor.fetchone()


            if not e_mail:
                cursor.execute('INSERT INTO username (username,password,email) VALUES (%s, %s, % s)', (username, password, email,))
                mysql.connection.commit()
                return 'Sucess'
            
            elif e_mail:
                msgerorregister='Email sudah ada yang menggunakan !'
                return render_template('login.html',msgerorregister=msgerorregister)
            
            else:
                return 'Something wrong'

        return 'cant'

    except Exception as e :
        return e





@app.route('/index')
def masuk_01():
    if session.get('username'):
        return render_template("index.html")
    else:
        return redirect(url_for('login'))


@app.route('/indexadmin')
def masuk_02():
    if session.get('admin'):
        return render_template("index.html")
    else:
        return redirect(url_for('login'))




# keluar + menghapus session yang telah dihapus
@app.route('/keluar')
def keluar():
    session.clear()
    return redirect(url_for('login'))


if __name__ == "__main__":
    app.run(debug=True,port=3000)

    
