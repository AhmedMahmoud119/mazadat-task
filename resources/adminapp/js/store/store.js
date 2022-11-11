import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import MainCategoriesIndex from './cruds/MainCategories'
import MainCategoriesSingle from './cruds/MainCategories/single'
import SubCategoriesIndex from './cruds/SubCategories'
import SubCategoriesSingle from './cruds/SubCategories/single'
import CategoryPropertiesIndex from './cruds/CategoryProperties'
import CategoryPropertiesSingle from './cruds/CategoryProperties/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    MainCategoriesIndex,
    MainCategoriesSingle,
    SubCategoriesIndex,
    SubCategoriesSingle,
    CategoryPropertiesIndex,
    CategoryPropertiesSingle
  },
  strict: debug
})
