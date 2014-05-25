<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
    'address' => array(
        'caption' => 'Address',
        'type' => 'text'
    ),
    'data' => array(
        'caption' => 'Data',
        'type' => 'textarea'
    ),

    'icon' => array(
        'caption' => 'Icon',
        'type' => 'image'
    ),
    'iconprev' => array(
        'caption' => 'Icon preview',
        'type' => 'thumb',
        'thumbof' => 'icon'
    ),
);
$settings['templates'] = array(
    'outerTpl' => '    <script type="text/javascript">

      $(function(){
      $("#gmap3TV").gmap3({
  map:{
    options:{
      zoom: 5
    }
  },
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
      }
    }
  }
        });
      });</script>
       <div id="gmap3TV" class="gmap3"></div>',
    'rowTpl' => '{address:"[+address+]", data:"[+data+]", options:{icon: "[+icon+]"}},'
);
$settings['configuration'] = array(
    'enablePaste' => true,
    'enableClear' => true,
    'csvseparator' => ','
);