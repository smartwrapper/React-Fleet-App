
import React, { PureComponent } from 'react'
import {
  Text, // Renders text
  ImageBackground,
  View,
  Dimensions,
  StatusBar, PixelRatio,
  Image
} from 'react-native'
import { createSelector } from 'reselect'
import { CardStyleInterpolators } from 'react-navigation-stack'
import Swiper from '../common/Swiper'
import { appTextStyle } from '../common/Theme.style'
import { connect } from 'react-redux'
const WIDTH = Dimensions.get('window').width
const Height = Dimensions.get('window').height
class Screen extends PureComponent {
  static navigationOptions = () => ({
    headerShown: false,
    gestureEnabled: false,
    drawerLockMode: 'locked-closed',
    cardStyleInterpolator: CardStyleInterpolators.forHorizontalIOS

  })

  constructor (props) {
    super(props)
    if (!this.props.showIntro) {
      this.props.navigation.navigate('App')
    }
  }

  render () {
    return (
      <View style={{ flex: 1, backgroundColor: this.props.themeStyle.primaryBackgroundColor }}>
        <StatusBar backgroundColor={this.props.themeStyle.StatusBarColor} barStyle='light-content' hidden borderBottomWidth={0} />
        <Swiper navigation={this.props.navigation} type='intro' >
          {/* First screen */}
          <ImageBackground
            style={{
              width: WIDTH,
              flex: 1,
              alignItems: 'center',
              justifyContent: 'center'
            }}
            resizeMode={'cover'}
          >
            <View style={{ flex: 40 }}>
              <Image
                style={{
                  height: Height * 0.8,
                  width: WIDTH * 0.9,
                  marginTop: 30
                }}
                resizeMode={'contain'}
                source={require('../images/IntroImages/OnlineGroceries-cuate.png')}
              />
            </View>
            <View style={{ width: '75%', left: WIDTH * 0.15, top: '5%', position: 'absolute' }}>
              <Text style={{
                color: '#000000',
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'left',
                paddingBottom: 3
              }}>Online Shopping</Text>
              <Text style={{
                color: this.props.themeStyle.primary,
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'right'
              }}>Made Easy</Text>
            </View>
          </ImageBackground>

          {/* Second screen */}
          <ImageBackground
            style={{
              width: WIDTH,
              flex: 1,
              alignItems: 'center',
              justifyContent: 'center'
            }}
            resizeMode={'cover'}
          >
            <View style={{ flex: 40 }}>
              <Image
                style={{
                  height: Height * 0.8,
                  width: WIDTH * 0.9,
                  marginTop: 30
                }}
                resizeMode={'contain'}
                source={require('../images/IntroImages/Cooking-cuate.png')}
              />
            </View>
            <View style={{ width: '75%', left: WIDTH * 0.15, top: '5%', position: 'absolute' }}>
              <Text style={{
                color: '#000000',
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'left',
                paddingBottom: 3
              }}>Cook Instantly</Text>
              <Text style={{
                color: this.props.themeStyle.primary,
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'right'
              }}>Without Any Worries</Text>
            </View>
          </ImageBackground>

          {/* Third screen */}
          <ImageBackground
            style={{
              width: WIDTH,
              flex: 1,
              alignItems: 'center',
              justifyContent: 'center'
            }}
            resizeMode={'cover'}
          >
            <View style={{ flex: 40 }}>
              <Image
                style={{
                  height: Height * 0.8,
                  width: WIDTH * 0.9,
                  marginTop: 30
                }}
                resizeMode={'contain'}
                source={require('../images/IntroImages/TakeAway-cuate.png')}
              />
            </View>
            <View style={{ width: '75%', left: WIDTH * 0.15, top: '5%', position: 'absolute' }}>
              <Text style={{
                color: '#000000',
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'left',
                paddingBottom: 3
              }}>Ship at your home</Text>
              <Text style={{
                color: this.props.themeStyle.primary,
                fontFamily: appTextStyle.fontFamily,
                fontSize: appTextStyle.largeSize + PixelRatio.getPixelSizeForLayoutSize(7),
                fontWeight: 'bold',
                textAlign: 'right'
              }}>In no time</Text>
            </View>
          </ImageBackground>

        </Swiper>
      </View>
    )
  }
}

/// ///////////////////////////////////////////////

const getTheme = (state) => state.appConfig.themeStyle
const getThemeFun = createSelector(
  [getTheme],
  (getTheme) => {
    return getTheme
  }
)
const mapStateToProps = state => ({
  themeStyle: getThemeFun(state),
  showIntro: state.appConfig.showIntro
})
export default connect(
  mapStateToProps,
  null
)(Screen)
