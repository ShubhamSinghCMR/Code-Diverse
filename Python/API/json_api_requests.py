import requests

req= requests.get("https://swapi.dev/api/people/1")

person=req.json()
print (person)

print(f"Name: {person['name']}")
print("His films:")
for film in person['films']:
    req=requests.get(film)
    p_film=req.json()
    print(f"Film name: {p_film['title']}")