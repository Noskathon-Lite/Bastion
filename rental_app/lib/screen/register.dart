// ignore_for_file: use_build_context_synchronously

import 'package:flutter/material.dart';
import 'package:flutter_feather_icons/flutter_feather_icons.dart';
import 'package:rewahn/main.dart';
import 'package:rewahn/providers/auth.dart';
import 'package:rewahn/screen/login_screen.dart';
import 'package:rewahn/widgets/custom_button.dart';
import 'package:rewahn/widgets/custom_snack_bar.dart';
import 'package:rewahn/widgets/custom_textformfiled.dart';

import 'package:provider/provider.dart';

class Register extends StatefulWidget {
  const Register({super.key});

  @override
  State<Register> createState() => _RegisterState();
}

class _RegisterState extends State<Register> {
  final TextEditingController _name = TextEditingController();
  final TextEditingController _email = TextEditingController();
  final TextEditingController _password = TextEditingController();
  final TextEditingController _passwordConfirm = TextEditingController();

  final _formKey = GlobalKey<FormState>();

  Future submit() async {
    if (_formKey.currentState!.validate()) {
      await Provider.of<Auth>(context, listen: false).register(credential: {
        //'name': _name.text,
        //'email': _email.text,
        //'password': _password.text,
        // 'password_confirm': _passwordConfirm.text
      });

      ScaffoldMessenger.of(context).showSnackBar(
          customSnackBar(context, 'successfully registerd in', false));
      Navigator.pushReplacement(
          context, MaterialPageRoute(builder: ((context) => const HomePage())));
    } else {
      ScaffoldMessenger.of(context)
          .showSnackBar(customSnackBar(context, 'faild to register', true));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: SafeArea(
        child: ListView(
          children: [
            Padding(
              padding: const EdgeInsets.only(top: 20),
              child: Column(
                children: [
                  const Text('Register Here',
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
                                email: _name,
                                hint: 'Enter Your Name',
                                label: 'Name'),
                            const SizedBox(
                              height: 16,
                            ),
                            CustomTextFormField(
                                email: _email,
                                hint: 'example@gmail.com',
                                label: 'Email'),
                            const SizedBox(
                              height: 16,
                            ),
                            CustomTextFormField(
                                email: _password,
                                hint: 'Enter Your Password',
                                label: 'Password'),
                            const SizedBox(
                              height: 16,
                            ),
                            TextFormField(
                              decoration: InputDecoration(
                                border: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(10),
                                    borderSide: BorderSide(
                                      color: Colors.indigo.shade500,
                                    )),
                                focusedBorder: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(10),
                                    borderSide: const BorderSide(
                                        color: Colors.indigo, width: 2)),
                                labelText: 'PasswordConfirm',
                                suffixIcon: GestureDetector(
                                  onTap: () {
                                    Provider.of<Auth>(context, listen: false)
                                        .toggleText();
                                  },
                                  child: context.watch<Auth>().obscureText
                                      ? const Icon(
                                          FeatherIcons.eyeOff,
                                          color: Colors.indigo,
                                        )
                                      : const Icon(
                                          FeatherIcons.eye,
                                          color: Colors.indigo,
                                        ),
                                ),
                              ),
                              obscureText:
                                  Provider.of<Auth>(context).obscureText,
                              controller: _passwordConfirm,
                              autofocus: true,
                              validator: (value) {
                                if (value == null || value.isEmpty) {
                                  return 'password confirm field is required';
                                }
                                if (value != _password.text) {
                                  return 'The Password You Enterd Does not match';
                                } else {
                                  return null;
                                }
                              },
                            ),
                            CustomButton(onTap: submit, title: 'Register')
                          ],
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
            const SizedBox(
              height: 20,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text('you already have account?'),
                TextButton(
                    onPressed: () => Navigator.pushReplacement(
                        context,
                        MaterialPageRoute(
                            builder: ((context) => const LoginScreen()))),
                    child: const Text(
                      'Login',
                      style: TextStyle(color: Colors.indigo),
                    ))
              ],
            )
          ],
        ),
      ),
    );
  }
}
