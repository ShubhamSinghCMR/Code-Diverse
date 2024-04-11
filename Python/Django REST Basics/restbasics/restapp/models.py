from django.db import models

class Employee(models.Model):
    id=models.IntegerField(primary_key=True)
    name=models.CharField(max_length=200)
    salary=models.DecimalField(max_digits=20,decimal_places=3)

    def __str__(self):
        return self.id
