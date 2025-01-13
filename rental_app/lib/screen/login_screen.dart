// ignore_for_file: use_build_context_synchronously

import 'package:flutter/material.dart';
import 'package:rewahn/main.dart';
import 'package:rewahn/providers/auth.dart';
import 'package:rewahn/screen/register.dart';
import 'package:rewahn/widgets/custom_button.dart';
import 'package:rewahn/widgets/custom_snack_bar.dart';
import 'package:rewahn/widgets/custom_textformfiled.dart';

import 'package:provider/provider.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({super.key});

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final TextEditingController _email = TextEditingController();
  final TextEditingController _password = TextEditingController();

  final _formKey = GlobalKey<FormState>();

  Future submit() async {
    if (_formKey.currentState!.validate()) {
      await Provider.of<Auth>(context, listen: false).login(
          credential: {'email': _email.text, 'password': _password.text});

      ScaffoldMessenger.of(context).showSnackBar(
          customSnackBar(context, 'successfully logged in', false));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: ((context) => const HomePage())));
    } else {
      ScaffoldMessenger.of(context)
          .showSnackBar(customSnackBar(context, 'faild to login ', true));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: Padding(
          padding: const EdgeInsets.only(top: 20),
          child: Column(children: [
            const Text('Login Here',
                style: TextStyle(
                    color: Colors.indigo,
                    fontSize: 30,
                    fontWeight: FontWeight.bold)),
            const SizedBox(
              height: 20,
            ),
            Form(
              key: _formKey,
              child: Scrollbar(
                child: SingleChildScrollView(
                  padding: const EdgeInsets.all(16),
                  child: Column(
                    children: [
                      CustomTextFormField(
                        email: _email,
                        label: 'Email',
                        hint: 'example@gmail.com',
                      ),
                      const SizedBox(
                        height: 16,
                      ),
                      CustomTextFormField(
                          email: _password,
                          hint: 'Enter Your Password',
                          label: 'Password'),
                      CustomButton(onTap: submit, title: 'Login')
                    ],
                  ),
                ),
              ),
            ),
            const SizedBox(
              height: 20,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const SizedBox(
                  child: Text("Don't you have an account yet?"),
                ),
                TextButton(
                    onPressed: () => Navigator.pushReplacement(
                        context,
                        MaterialPageRoute(
                            builder: ((context) => const Register()))),
                    child: const Text(
                      'Register',
                      style: TextStyle(color: Color.fromARGB(255, 40, 25, 168)),
                    ))
              ],
            )
          ]),
        ),
      ),
    );
  }
}
