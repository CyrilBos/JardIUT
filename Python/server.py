import http.server

class MyHandler(http.server.BaseHTTPRequestHandler):
    def do_GET(self):
        print("test")

MyHandlerClass = MyHandler

        
PORT = 8000

httpd = http.server.HTTPServer(("localhost", 8000), MyHandler)

httpd.serve_forever()
