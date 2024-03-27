import pika

connection = pika.BlockingConnection(pika.ConnectionParameters('127.0.0.1'))
channel = connection.channel()
channel.queue_declare(queue="hello")

channel.basic_publish(exchange="", routing_key="hello", body="hello_world 2")
print("Message Sent Hello World")

connection.close()
