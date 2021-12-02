import 'package:app/pages/encuesta_page.dart';
import 'package:app/pages/home_page.dart';
import 'package:app/pages/listado_encuestas_page.dart';
import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      initialRoute: HomePage.routeName,
      routes: {
        HomePage.routeName: (_) => const HomePage(),
        ListadoEncuestasPage.routeName: (_) => const ListadoEncuestasPage(),
        EncuestaPage.routeName: (_) => const EncuestaPage(),
      },
    );
  }
}
