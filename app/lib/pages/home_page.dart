import 'package:app/pages/listado_encuestas_page.dart';
import 'package:app/services/encuestas_service.dart';
import 'package:app/widgets/custom_button.dart';
import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  static const String routeName = 'home-page';
  const HomePage({Key? key}) : super(key: key);

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  bool cargando = false;
  String texto = "";
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Center(child: Text('Obtener encuestas')),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            cargando
                ? Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.all(10.0),
                        child: SizedBox(
                          width: 300.0,
                          child: Center(
                            child: Text(
                              'Cargando desde $texto',
                              textAlign: TextAlign.center,
                            ),
                          ),
                        ),
                      ),
                      const Padding(
                        padding: EdgeInsets.all(30.0),
                        child: SizedBox(
                          height: 60.0,
                          width: 60.0,
                          child: CircularProgressIndicator(
                            strokeWidth: 6.5,
                          ),
                        ),
                      ),
                    ],
                  )
                : Column(
                    children: [
                      CustomButton(
                        label: "Obtener encuestas desde PostgreSQL",
                        onPressed: () => obtenerEncuestas(true),
                      ),
                      CustomButton(
                        label: "Obtener encuestas desde Firebase",
                        onPressed: () => obtenerEncuestas(false),
                      ),
                      // 
                    ],
                  ),
          ],
        ),
      ),
    );
  }

  Future<void> obtenerEncuestas(bool bandera) async {
    setState(() {
      cargando = true;
      texto = bandera ? "PostgreSQL" : "Firebase";
    });
    final encuestas = await EncuestasService.obtenerEncuestas(bandera);
    cargando = false;
    if (encuestas != null) {
      Navigator.of(context).push(
        MaterialPageRoute(
          builder: (BuildContext context) => ListadoEncuestasPage(
            encuestas: encuestas,
          ),
        ),
      );
    }
    setState(() {
      cargando = false;
      texto = "";
    });
  }
}
