from django.contrib import admin
from django.urls import path
from .views import employeeView

app_name = 'restapp'

urlpatterns = [
    path('',employeeView, name='employees'),
]
