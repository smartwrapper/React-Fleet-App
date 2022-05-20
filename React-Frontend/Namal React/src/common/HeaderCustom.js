import React, { PureComponent } from 'react'
import {
  StyleSheet, // Renders text
  View,
  Dimensions,
  I18nManager,
  Platform,
  Text,
  TouchableOpacity
} from 'react-native'
import { appTextStyle } from '../common/Theme.style'
import ShoppingCartIcon3 from '../common/ShoppingCartIcon3'
import { connect } from 'react-redux'
import { Icon } from 'native-base'
import { createSelector } from 'reselect'
const WIDTH = Dimensions.get('window').width
class Header extends PureComponent {
  constructor (props) {
    super(props)
    this.state = {
      searchText: ''
    }
  }

  render ({
    name, cartIcon, backIcon, navigation, menuIcon, shadow,
    searchIcon
  } = this.props) {
    const parent = navigation.dangerouslyGetParent().state.index
    const routeName = navigation.state.routeName
    return (
      <View style={[styles.headerView,
        {
          backgroundColor: this.props.themeStyle.primaryBackgroundColor
        }]}>

        {(!menuIcon && backIcon && parent >= 0) ||
          routeName === 'CartScreen'
          ? <Icon
            onPress={() => {
              navigation.goBack()
            }}
            name={!I18nManager.isRTL ? 'arrow-back' : 'arrow-forward'}
            style={{
              color: this.props.themeStyle.textColor,
              fontSize: 24,
              padding: 5,
              paddingHorizontal: 0,
              zIndex: 12,
              marginTop: Platform.OS === 'ios' ? -12 : -19

            }}
          />
          : menuIcon ? null : < View style={{
            padding: 15,
            paddingHorizontal: 0,
            marginTop: -8

          }} />
        }
        {(menuIcon && parent === 0
          ? <TouchableOpacity
            style={{
              marginTop: Platform.OS === 'ios' ? -14 : -22,
              zIndex: 40
            }}
            onPress={() => { this.props.navigation.openDrawer() }}>
            <Icon
              onPress={() => {
                this.props.navigation.openDrawer()
              }}
              name={'menu'}
              style={{
                color: this.props.themeStyle.textColor,
                fontSize: 24,
                padding: 5,
                paddingHorizontal: 0

              }}
            />
          </TouchableOpacity>
          : null)
        }

        <Text
          style={{
            fontSize: appTextStyle.largeSize + 4,
            color: this.props.themeStyle.textColor,
            fontWeight: 'bold',
            position: 'absolute',
            width: WIDTH,
            textAlign: 'center',
            fontFamily: appTextStyle.fontFamily
          }}>
          {name}
        </Text>

        <View style={{
          flexDirection: 'row',
          justifyContent: 'center',
          alignItems: 'center',
          paddingBottom: 6,
          marginTop: Platform.OS === 'ios' ? -12 : -22
        }}>

          {searchIcon
            ? <TouchableOpacity
              style={{ paddingHorizontal: 14 }}
              onPress={() => { this.props.navigation.navigate('SearchScreen') }}>
              <Icon
                name={'search'}
                style={{
                  color: this.props.themeStyle.textColor,
                  fontSize: 20
                }}
              />
            </TouchableOpacity>
            : null}
          {cartIcon
            ? <ShoppingCartIcon3 props={this.props} />
            : < View style={{
              height: 15,
              width: 17
            }} />
          }
        </View>

      </View>
    )
  }
}
const getTheme = (state) => state.appConfig.themeStyle
const getThemeFun = createSelector(
  [getTheme],
  (getTheme) => {
    return getTheme
  }
)
const mapStateToProps = state => ({
  themeStyle: getThemeFun(state)
})
export default connect(mapStateToProps, null)(Header)

const styles = StyleSheet.create({
  headerView: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    paddingHorizontal: 15,
    paddingVertical: Platform.OS === 'android' ? 28 : 20,
    width: WIDTH,
    paddingBottom: 4,
    marginBottom: 2
  },
  iconStyle: {
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    borderRadius: appTextStyle.customRadius - 3,
    padding: Platform.OS === 'ios' ? 3 : 0
  },
  textinputStyle: {
    textAlign: I18nManager.isRTL ? 'right' : 'left',
    paddingLeft: 8,
    paddingRight: 8,
    alignItems: 'center',
    justifyContent: 'center',
    paddingVertical: 0
  },
  innerView: {
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    width: WIDTH * 0.80,
    borderRadius: appTextStyle.customRadius - 3,
    padding: Platform.OS === 'ios' ? 3 : 0
  },
  shadowStyle: {
    shadowOffset: { width: 1, height: 2 },
    shadowOpacity: 0.2,
    shadowRadius: 2,
    elevation: 3
  }
})
