from flask import Flask, render_template, redirect, request, url_for, flash
from model.model import Model

app = Flask(__name__, template_folder="templates")
app.secret_key = '_5#y2L"F4Q8z\n\xec]/'
model = Model()

@app.route('/', methods=["GET"])
def index():
    return render_template('index.html')

@app.route('/login', methods=['POST', 'GET'])
def login():
    if request.method == "POST":
        username = request.form.get('username')
        password = request.form.get('password')
        model.cursor.execute(f"SELECT username, password FROM `users` WHERE username='{username}';" )
        one_data = model.cursor.fetchone()
        if one_data[1] == password:
            return redirect('/dashboard')
        else:
            flash("Incorrect password, try again!")
        return render_template('login.html')
    else:
        return render_template('login.html')

@app.route('/register', methods=["POST"])
def register():
    if request.method == "POST":
        email = request.form.get('email')
        username = request.form.get('username')
        password = request.form.get('password')
        confirm_password = request.form.get("confirm_password")
        if password == confirm_password:
            if model.insert(email, username, password):
                flash("Data berhasil ditambahkan!")
            else:
                flash("Mohon diulang!")
            return redirect('/login')
        else:
            flash("Re-password harus sama dengan password!")
        return redirect('/register')
    else:
        return redirect('/register')

@app.route('/dashboard')
def admin():
    return render_template('dashboard.html')

if __name__ == "__main__":
    app.run(debug=True, port=3000)