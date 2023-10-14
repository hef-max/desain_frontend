import mysql.connector as mysql 

class Model:
	def __init__(self):
		self.db = mysql.connect(
			host="127.0.0.1",
			user="root",
			password="",
			database="db_users"
			)
		self.cursor = self.db.cursor()
		
	def insert(self, email, username, password):
		self.cursor.execute("INSERT INTO `users` VALUES (%s, %s, %s);",(username, email, password, ))
		return self.db.commit()

