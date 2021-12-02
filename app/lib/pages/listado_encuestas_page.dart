import 'package:app/pages/encuesta_page.dart';
import 'package:flutter/material.dart';
import 'package:app/models/encuestas.dart';

class ListadoEncuestasPage extends StatefulWidget {
  static const String routeName = 'listado-encuestas-page';
  final Encuestas? encuestas;
  const ListadoEncuestasPage({
    Key? key,
    this.encuestas,
  }) : super(key: key);

  @override
  State<ListadoEncuestasPage> createState() => _ListadoEncuestasPageState();
}

class _ListadoEncuestasPageState extends State<ListadoEncuestasPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Center(child: Text('Listado de encuestas')),
      ),
      body: Center(
        child: ListView(
          children: _encuestas(),
        ),
      ),
    );
  }

  List<Widget> _encuestas() {
    final list = <Widget>[];
    for (Encuesta? encuesta in widget.encuestas!.encuestas) {
      list.add(
        Padding(
          padding: const EdgeInsets.only(left: 10.0, right: 10.0),
          child: Card(
            margin: const EdgeInsets.only(top: 20.0, left: 20.0, right: 20.0),
            elevation: 5.0,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(8.0),
            ),
            child: Padding(
              padding: const EdgeInsets.all(15.0),
              child: ListTile(
                title: Text(
                  '${encuesta!.id}. ${encuesta.titulo}',
                  style: const TextStyle(fontWeight: FontWeight.w500),
                ),
                subtitle: Padding(
                  padding: const EdgeInsets.only(top: 8.0),
                  child: Text(
                    encuesta.descripcion,
                    textAlign: TextAlign.justify,
                  ),
                ),
                onTap: () {
                  Navigator.of(context).push(
                    MaterialPageRoute(
                      builder: (BuildContext context) => EncuestaPage(
                        encuesta: encuesta,
                      ),
                    ),
                  );
                },
              ),
            ),
          ),
        ),
      );
    }
    return list;
  }
}
