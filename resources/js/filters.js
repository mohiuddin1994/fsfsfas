
import moment from "moment"
import Vue from "vue"

Vue.filter('formatDate', function(value) {

    return moment(value).format('MM/DD/YYYY')

  }),
  Vue.filter("strShort",function(text,length,extra){

      if (text.toString().length > length) {
       return text.toString().substring(0,length) + extra;
      } else {
           return text.toString().substring(0,length) ;
    }




  })





