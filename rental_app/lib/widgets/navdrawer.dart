import 'package:flutter/material.dart';
import 'package:rewahn/screen/login_screen.dart';
import 'package:rewahn/screen/posts_screen.dart';
import 'package:rewahn/screen/register.dart';
import 'package:provider/provider.dart';

import '../providers/auth.dart';

class NavDrawer extends StatelessWidget {
  const NavDrawer({super.key});

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: Consumer<Auth>(
        builder: ((context, auth, child) {
          if (auth.authenticated) {
            return ListView(
              children: [
                // ignore: unnecessary_null_comparison
                DrawerHeader(
                    // ignore: unnecessary_null_comparison
                    child: auth == null
                        ? const CircleAvatar(
                            backgroundColor: Colors.blue,
                          )
                        : ListTile(
                            leading: const CircleAvatar(
                              backgroundColor: Colors.blue,
                            ),
                            title: Text(auth.user?.name ?? ''),
                            subtitle: Text(auth.user?.email ?? ''),
                            trailing: Text(auth.user?.id ?? ''),
                          )),
                ListTile(
                  title: const Text('posts'),
                  onTap: () => Navigator.push(
                      context,
                      MaterialPageRoute(
                          builder: ((context) => const PostsScreen()))),
                ),
                ListTile(
                    title: const Text('logout'),
                    onTap: () {
                      Provider.of<Auth>(context, listen: false).logout();
                      Navigator.pop(context);
                    }),
              ],
            );
          } else {
            return ListView(
              children: [
                ListTile(
                    title: const Text('register'),
                    onTap: () => Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: ((context) => const Register())))),
                ListTile(
                  title: const Text('Login'),
                  onTap: (() => Navigator.push(
                      context,
                      MaterialPageRoute(
                          builder: ((context) => const LoginScreen())))),
                ),
              ],
            );
          }
        }),
      ),
    );
  }
}
