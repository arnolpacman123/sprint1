// To parse this JSON data, do
//
//     final encuestas = encuestasFromMap(jsonString);

import 'dart:convert';

Encuestas encuestasFromMap(String str) => Encuestas.fromMap(json.decode(str));

String encuestasToMap(Encuestas data) => json.encode(data.toMap());

class Encuestas {
  Encuestas({
    required this.encuestas,
  });

  final List<Encuesta?> encuestas;

  factory Encuestas.fromMap(Map<String, dynamic> json) => Encuestas(
        encuestas: List<Encuesta?>.from(
          json["encuestas"].map((x) => Encuesta.fromMap(x)),
        ),
      );

  Map<String, dynamic> toMap() => {
        "encuestas": List<dynamic>.from(
          encuestas.map((x) => x!.toMap()),
        ),
      };
}

class Encuesta {
  Encuesta({
    required this.id,
    required this.titulo,
    required this.descripcion,
    required this.estado,
    required this.createdAt,
    required this.updatedAt,
    required this.secciones,
  });

  final int id;
  final String titulo;
  final String descripcion;
  final bool estado;
  final DateTime createdAt;
  final DateTime updatedAt;
  final List<Seccion?> secciones;

  factory Encuesta.fromMap(Map<String, dynamic> json) => Encuesta(
        id: json["id"],
        titulo: json["titulo"],
        descripcion: json["descripcion"],
        estado: json["estado"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
        secciones: List<Seccion?>.from(
          json["secciones"]!.map((x) => Seccion.fromMap(x)),
        ),
      );

  Map<String, dynamic> toMap() => {
        "id": id,
        "titulo": titulo,
        "descripcion": descripcion,
        "estado": estado,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
        "secciones": List<dynamic>.from(
          secciones.map((x) => x!.toMap()),
        ),
      };
}

class Seccion {
  Seccion({
    required this.id,
    required this.titulo,
    required this.descripcion,
    required this.encuestaId,
    required this.estado,
    required this.createdAt,
    required this.updatedAt,
    required this.preguntas,
  });

  final int id;
  final String titulo;
  final String descripcion;
  final int encuestaId;
  final bool estado;
  final DateTime createdAt;
  final DateTime updatedAt;
  final List<Pregunta?> preguntas;

  factory Seccion.fromMap(Map<String, dynamic> json) => Seccion(
        id: json["id"],
        titulo: json["titulo"],
        descripcion: json["descripcion"],
        encuestaId: json["encuesta_id"],
        estado: json["estado"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
        preguntas: List<Pregunta?>.from(
          json["preguntas"].map((x) => Pregunta.fromMap(x)),
        ),
      );

  Map<String, dynamic> toMap() => {
        "id": id,
        "titulo": titulo,
        "descripcion": descripcion,
        "encuesta_id": encuestaId,
        "estado": estado,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
        "preguntas": List<dynamic>.from(
          preguntas.map((x) => x!.toMap()),
        ),
      };
}

class Pregunta {
  Pregunta({
    required this.id,
    required this.enunciado,
    required this.tipo,
    required this.estado,
    required this.seccionId,
    required this.createdAt,
    required this.updatedAt,
    required this.opciones,
  });

  final int id;
  final String enunciado;
  final Tipo tipo;
  final bool estado;
  final int seccionId;
  final DateTime createdAt;
  final DateTime updatedAt;
  final List<Opcion?> opciones;

  factory Pregunta.fromMap(Map<String, dynamic> json) => Pregunta(
        id: json["id"],
        enunciado: json["enunciado"],
        tipo: tipoValues.map[json["tipo"]]!,
        estado: json["estado"],
        seccionId: json["seccion_id"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
        opciones: List<Opcion?>.from(
          json["opciones"].map((x) => Opcion.fromMap(x)),
        ),
      );

  Map<String, dynamic> toMap() => {
        "id": id,
        "enunciado": enunciado,
        "tipo": tipoValues.reverse[tipo],
        "estado": estado,
        "seccion_id": seccionId,
        "created_at": createdAt.toIso8601String(),
        "updated_at": updatedAt.toIso8601String(),
        "opciones": List<dynamic>.from(
          opciones.map((x) => x!.toMap()),
        ),
      };
}

class Opcion {
  Opcion({
    this.id,
    this.numero,
    this.valor,
    this.estado,
    this.preguntaId,
    this.createdAt,
    this.updatedAt,
  });

  final int? id;
  final int? numero;
  final String? valor;
  final bool? estado;
  final int? preguntaId;
  final DateTime? createdAt;
  final DateTime? updatedAt;

  factory Opcion.fromMap(Map<String, dynamic> json) => Opcion(
        id: json["id"],
        numero: json["numero"],
        valor: json["valor"],
        estado: json["estado"],
        preguntaId: json["pregunta_id"],
        createdAt: DateTime.parse(json["created_at"]),
        updatedAt: DateTime.parse(json["updated_at"]),
      );

  Map<String, dynamic> toMap() => {
        "id": id,
        "numero": numero,
        "valor": valor,
        "estado": estado,
        "pregunta_id": preguntaId,
        "created_at": createdAt!.toIso8601String(),
        "updated_at": updatedAt!.toIso8601String(),
      };
}

// ignore: constant_identifier_names
enum Tipo { CERRADA, ABIERTA }

final tipoValues = EnumValues(
  {
    "ABIERTA": Tipo.ABIERTA,
    "CERRADA": Tipo.CERRADA,
  },
);

class EnumValues<T> {
  Map<String, T> map;
  Map<T, String>? reverseMap;

  EnumValues(this.map);

  Map<T, String> get reverse {
    reverseMap ??= map.map((k, v) => MapEntry(v, k));
    return reverseMap!;
  }
}
