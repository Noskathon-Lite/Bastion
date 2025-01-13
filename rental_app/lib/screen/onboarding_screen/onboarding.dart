import 'package:flutter/material.dart';
import 'package:rewahn/helper/images.dart';
import 'package:rewahn/screen/login_screen.dart';
import 'package:rewahn/screen/onboarding_screen/first_screen.dart';
import 'package:rewahn/widgets/custom_button.dart';

class OnboardingScreen extends StatefulWidget {
  const OnboardingScreen({super.key});

  @override
  State<OnboardingScreen> createState() => _OnboardingScreenState();
}

class _OnboardingScreenState extends State<OnboardingScreen> {
  final PageController _controller = PageController();
  List<Widget> screens = [
    BuildPage(images: Images.truck, text: 'WELCOME TO REWAHN'),
    BuildPage(images: Images.freinds, text: 'WE DESTINATE YOUR ADVENTURE'),
    BuildPage(images: Images.catchs, text: 'ARE YOU READY'),
  ];

  bool isLastPage = false;
  @override
  void dispose() {
    _controller.dispose();
    super.dispose();
  }

  navigate() => Navigator.pushReplacement(
      context, MaterialPageRoute(builder: ((context) => const LoginScreen())));

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Padding(
        padding: const EdgeInsets.only(bottom: 80),
        child: PageView.builder(
          scrollDirection: Axis.vertical,
          controller: _controller,
          itemCount: screens.length,
          onPageChanged: (value) {
            setState(() {
              isLastPage = value == 2;
            });
          },
          itemBuilder: ((context, pageindex) {
            return Stack(
              children: [
                screens[pageindex],
                Positioned(
                  right: 25,
                  top: MediaQuery.of(context).size.height * 0.35,
                  child: Column(
                    children: List.generate(
                      3,
                      (index) {
                        return Padding(
                          padding: const EdgeInsets.all(2),
                          child: GestureDetector(
                            onTap: () => _controller.animateToPage(index,
                                duration: const Duration(milliseconds: 500),
                                curve: Curves.easeIn),
                            child: Container(
                              width: 8,
                              height: pageindex == index ? 25 : 8,
                              decoration: BoxDecoration(
                                  color: pageindex == index
                                      ? Colors.indigo
                                      : Colors.grey,
                                  borderRadius: BorderRadius.circular(20)),
                            ),
                          ),
                        );
                      },
                    ),
                  ),
                ),
              ],
            );
          }),
        ),
      ),
      bottomSheet: isLastPage
          ? CustomButton(
              title: 'Get Started',
              onTap: navigate,
            )
          : Container(
              padding: const EdgeInsets.symmetric(horizontal: 16),
              height: 80,
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  TextButton(
                    onPressed: () => _controller.nextPage(
                        duration: const Duration(microseconds: 1000),
                        curve: Curves.easeInOut),
                    child: const Text('NEXT'),
                  ),
                  TextButton(
                    onPressed: () => _controller.jumpToPage(2),
                    child: const Text('SKIP'),
                  ),
                ],
              ),
            ),
    );
  }
}
