(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[14],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);


function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; var ownKeys = Object.keys(source); if (typeof Object.getOwnPropertySymbols === 'function') { ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { return Object.getOwnPropertyDescriptor(source, sym).enumerable; })); } ownKeys.forEach(function (key) { _defineProperty(target, key, source[key]); }); } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'removed-vidrl',
  data: function data() {
    return {
      search: '',
      totalItems: 0,
      items: [],
      loading: false,
      pagination: {},
      headers: [{
        text: 'Asset',
        align: 'left',
        value: 'asset_code'
      }, {
        text: 'OS',
        value: 'os'
      }, {
        text: 'Building',
        value: 'building'
      }, {
        text: 'Campus',
        value: 'campus'
      }, {
        text: 'Department',
        value: 'department'
      }, {
        text: 'Floor',
        value: 'floor'
      }, {
        text: 'Location',
        value: 'location'
      }, {
        text: 'Serial Number',
        value: 'serial_number'
      }, {
        text: 'Make',
        value: 'make'
      }, {
        text: 'Model',
        value: 'model'
      }, {
        text: 'RAM',
        value: 'ram'
      }, {
        text: 'Notes',
        value: 'notes'
      }, {
        text: 'Purchase Date',
        value: 'purchase_date'
      }, {
        text: 'MAC Address',
        value: 'mac_address'
      }, {
        text: 'Replaced',
        value: 'replaced'
      }]
    };
  },
  methods: {
    fetchData: function () {
      var _fetchData = _asyncToGenerator(
      /*#__PURE__*/
      _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                this.loading = true;
                _context.prev = 1;
                _context.next = 4;
                return this.$store.dispatch('vidrl/fetchRemoved', _objectSpread({
                  search: this.search
                }, this.pagination));

              case 4:
                response = _context.sent;
                this.items = response.data;
                this.totalItems = response.meta.total;
                _context.next = 12;
                break;

              case 9:
                _context.prev = 9;
                _context.t0 = _context["catch"](1);
                console.error(_context.t0);

              case 12:
                this.loading = false;

              case 13:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[1, 9]]);
      }));

      function fetchData() {
        return _fetchData.apply(this, arguments);
      }

      return fetchData;
    }()
  },
  watch: {
    pagination: {
      handler: function handler() {
        this.fetchData();
      },
      deep: true
    },
    search: Object(lodash__WEBPACK_IMPORTED_MODULE_1__["debounce"])(function (search) {
      this.fetchData();
    }, 500)
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-layout",
    [
      _c(
        "v-flex",
        { attrs: { xs12: "" } },
        [
          _c(
            "v-card",
            [
              _c("v-card-title", [
                _c("h3", { attrs: { "ml-0": "" } }, [
                  _vm._v("Removed VIDRL Hospital")
                ])
              ]),
              _vm._v(" "),
              _c(
                "v-card-text",
                [
                  _c(
                    "v-flex",
                    { attrs: { "ml-0": "", row: "", md12: "" } },
                    [
                      _c("v-spacer"),
                      _vm._v(" "),
                      _c("v-text-field", {
                        attrs: {
                          "append-icon": "search",
                          label: "Search",
                          "single-line": "",
                          "hide-details": ""
                        },
                        model: {
                          value: _vm.search,
                          callback: function($$v) {
                            _vm.search = $$v
                          },
                          expression: "search"
                        }
                      })
                    ],
                    1
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "v-data-table",
                {
                  attrs: {
                    headers: _vm.headers,
                    items: _vm.items,
                    pagination: _vm.pagination,
                    "total-items": _vm.totalItems,
                    loading: _vm.loading
                  },
                  on: {
                    "update:pagination": function($event) {
                      _vm.pagination = $event
                    }
                  },
                  scopedSlots: _vm._u([
                    {
                      key: "items",
                      fn: function(props) {
                        return [
                          _c("td", [_vm._v(_vm._s(props.item.asset_code))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.os))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.building))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.campus))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.department))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.floor))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.location))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.serial_number))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.make))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.model))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.ram))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.notes))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.purchase_date))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.mac_address))]),
                          _vm._v(" "),
                          _c("td", [_vm._v(_vm._s(props.item.replaced))])
                        ]
                      }
                    }
                  ])
                },
                [
                  _vm._v(" "),
                  _c("v-alert", {
                    attrs: { value: true, color: "error", icon: "warning" },
                    scopedSlots: _vm._u([
                      {
                        key: "no-results",
                        fn: function() {
                          return [
                            _vm._v(
                              '\n          Your search for "' +
                                _vm._s(_vm.search) +
                                '" found no results.\n        '
                            )
                          ]
                        },
                        proxy: true
                      }
                    ])
                  })
                ],
                1
              )
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/removeditems/removedvidrl/index.vue":
/*!****************************************************************!*\
  !*** ./resources/js/pages/removeditems/removedvidrl/index.vue ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=a11058b8& */ "./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/removeditems/removedvidrl/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8& ***!
  \***********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=a11058b8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/removeditems/removedvidrl/index.vue?vue&type=template&id=a11058b8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_a11058b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);