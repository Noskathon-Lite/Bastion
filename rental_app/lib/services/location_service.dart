import 'package:location/location.dart';
import 'package:flutter_sms/flutter_sms.dart';
import 'package:connectivity_plus/connectivity_plus.dart';

class LocationService {
  Future<void> sendLocationIfOffline() async {
    var connectivityResult = await Connectivity().checkConnectivity();

    // ignore: unrelated_type_equality_checks
    if (connectivityResult == ConnectivityResult.none) {
      Location location = Location();
      bool serviceEnabled = await location.serviceEnabled();
      if (!serviceEnabled) {
        serviceEnabled = await location.requestService();
        if (!serviceEnabled) return;
      }

      PermissionStatus permissionGranted = await location.hasPermission();
      if (permissionGranted == PermissionStatus.denied) {
        permissionGranted = await location.requestPermission();
        if (permissionGranted != PermissionStatus.granted) return;
      }

      LocationData locationData = await location.getLocation();

      String message =
          "Location: Lat:${locationData.latitude}, Lon:${locationData.longitude}";
      String recipientNumber = "YOUR_SERVER_PHONE_NUMBER";

      await sendSMS(message: message, recipients: [recipientNumber]);
    }
  }
}
