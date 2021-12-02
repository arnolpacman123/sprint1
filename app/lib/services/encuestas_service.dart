import 'package:http/http.dart' as http;
import 'package:logger/logger.dart';
import 'package:app/models/encuestas.dart';

class EncuestasService {
  static const String urlRelacional =
      'https://api-sistema-de-encuestas.herokuapp.com/api/encuestas';
  static const String urlNoRelacional =
      'https://sistema-de-encuestas-f9a7d-default-rtdb.firebaseio.com/.json';
  static final Logger logger = Logger();

  static Future<Encuestas?> obtenerEncuestas(bool bandera) async {
    final url = bandera ? urlRelacional : urlNoRelacional;
    final response = await http.get(Uri.parse(url));
    logger.i(response.body);
    if (response.statusCode == 200 || response.statusCode == 201) {
      final encuestas = encuestasFromMap(response.body);
      return encuestas;
    }
    return null;
  }
}
