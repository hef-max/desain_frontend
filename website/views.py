from flask import Blueprint, render_template, flash
from flask_login import login_required, current_user
from . import db

views = Blueprint('views', __name__)

@views.route('/')
def home():
    return render_template('index.html')

@views.route('/dashboard', methods=['GET', 'POST'])
@login_required
def index():
    items = {
    "name": 'Adam Syafir'
    }
    return render_template("dashboard.html", items=items, user=current_user)
