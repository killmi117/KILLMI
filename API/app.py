from flask import Flask, jsonify
from datetime import datetime
import geocoder
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

@app.route('/')
def index():
    return 'Página de inicio'

@app.route('/ubicacion', methods=['GET'])
def obtener_ubicacion():
    # Obtener la ubicación actual
    ubicacion = geocoder.ip('me')

    # Obtener la hora actual
    hora_actual = datetime.now().strftime('%Y-%m-%d %H:%M:%S')

    # Crear un diccionario con la información
    informacion = {
        'ubicacion': {
            'latitud': ubicacion.latlng[0],
            'longitud': ubicacion.latlng[1],
            'ciudad': ubicacion.city,
            'pais': ubicacion.country
        },
        'hora': hora_actual
    }

    return jsonify(informacion)

if __name__ == '__main__':
    app.run(debug=True)
