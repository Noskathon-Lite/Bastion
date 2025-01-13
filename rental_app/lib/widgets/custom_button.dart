// ignore_for_file: must_be_immutable

import 'package:flutter/material.dart';

class CustomButton extends StatelessWidget {
  CustomButton({Key? key, required this.onTap, required this.title})
      : super(key: key);
  Function() onTap;
  String title;
  @override
  Widget build(BuildContext context) {
    return Container(
      padding: const EdgeInsets.all(8),
      width: MediaQuery.of(context).size.width,
      height: 80,
      child: TextButton(
          style: ButtonStyle(
              backgroundColor: WidgetStateProperty.all<Color>(Colors.indigo),
              shape: WidgetStateProperty.all<RoundedRectangleBorder>(
                  RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(20)))),
          onPressed: onTap,
          child: Text(
            title,
            style: const TextStyle(color: Colors.white, fontSize: 16),
          )),
    );
  }
}
