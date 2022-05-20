import { Dimensions } from 'react-native'
// import uuid from 'react-native-uuid'
const WIDTH = Dimensions.get('window').width
// set card width according to your requirement
const cardWidth = WIDTH * 0.3991

export default {
  /// /////////////////////////////

  url: '', // your site URL
  clientid: '1234',
  clientsecret: 'sk_1234',
  oneSignalAppIdForAndroid: '',
  webClientIdForGoogleSign: '930506877678-bf26utnomcqku7smdtquau8e7aoftc5b.apps.googleusercontent.com', // please add youe webclient id from google json file for google login

  // Banners props
  autoplay: true,
  autoplayDelay: 2,
  autoplayLoop: true,
  appInProduction: false,

  /// //////// cartWidth
  singleRowCardWidth: cardWidth,
  twoRowCardWIdth: 0.465,
  barStyle: 'light-content' // dark-content, default
}

export const appTextStyle = {
  smallSize: 11,
  mediumSize: 12,
  largeSize: 14,
  customRadius: 19,
  fontFamily: 'Montserrat-Regular',
  isDarkMode: false
}
export const appLightTheme = {
  StatusBarColor: '#47a9ff',
  barStyle: 'light-content',
  primary: '#47a9ff',
  secondry: '#ffc854',
  primaryLight: '#f1f3f2',
  primaryBackgroundColor: '#ffffff',
  secondryBackgroundColor: '#ffffff', // backgroundcolor black
  textColor: '#444444',
  cardTextColor: '#000000',
  textTintColor: '#ffffff',
  iconPrimaryColor: '#9ba5a7',
  iconSecondryColor: '#000000'
}
export const appDarkTheme = {
  StatusBarColor: '#47a9ff',
  barStyle: 'light-content',
  primary: '#47a9ff',
  primaryLight: '#f1f3f2',
  secondry: '#ffc854',
  cardTextColor: '#000000',
  primaryBackgroundColor: '#252525', //
  secondryBackgroundColor: '#252525', // backgroundcolor white
  textColor: '#ffffff',
  textTintColor: '#ffffff',
  iconPrimaryColor: '#9ba5a7',
  iconSecondryColor: '#ffffff'
}
