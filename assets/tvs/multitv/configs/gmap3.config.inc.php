<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
    'latLng' => array(
        'caption' => 'LatLong',
        'type' => 'text'
    ),
    'address' => array(
        'caption' => 'Address',
        'type' => 'text'
    ),
    'data' => array(
        'caption' => 'Popup balloon text',
        'type' => 'textarea'
    ),

    'icon' => array(
        'caption' => 'Custom Icon',
        'type' => 'image'
    )
);
$settings['templates'] = array(
    'outerTpl' => '    <script type="text/javascript">

jQuery(document).ready(function($){
      $("#gmap3TV").gmap3({

  marker:{
    values:[[+wrapper+] ],
    options:{
      draggable: false
    },
    events:{
      mouseover: function(marker, event, context){
        var map = $(this).gmap3("get"),
          infowindow = $(this).gmap3({get:{name:"infowindow"}});
        if (infowindow){
          infowindow.open(map, marker);
          infowindow.setContent(context.data);
        } else {
          $(this).gmap3({
            infowindow:{
              anchor:marker,
              options:{content: context.data}
            }
          });
        }
      },
      mouseout: function(){
        var infowindow = $(this).gmap3({get:{name:"infowindow"}});
        if (infowindow){
          infowindow.close();
        }
      },
      map:{
    options:{
    //  zoom: 5
    }
  }
    }
  },
    autofit:{maxZoom: 14}
        });
      });</script>
       <div id="gmap3TV" class="gmap3"></div>',
    'rowTpl' => '{[+latLng:ne=``:then=`latLng:[[+latLng+]]`:else=`address:"[+address+]"`+], data:"[+data+]" [+icon:ne=``:then=`, options:{icon: "[+icon+]"}`+]},'
);
$settings['configuration'] = array(
    'enablePaste' => true,
    'enableClear' => true,
    'csvseparator' => ','
);