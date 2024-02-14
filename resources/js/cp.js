//Vue.component('Location', require('./components/fieldtypes/Location.vue'));
import Location from "./components/fieldtypes/Location";
import ProductSystem from "./components/fieldtypes/ProductSystem";
import PageEditor from "./components/fieldtypes/PageEditor";


Statamic.booting(() => {
  // NOTE: We need to add `-fieldtype` to the end of our
  // component's name in order for the CP to recognize it.
  Statamic.$components.register("location-fieldtype", Location);
  Statamic.$components.register("product_system-fieldtype", ProductSystem);
  Statamic.$components.register("page_editor-fieldtype", PageEditor);
});

