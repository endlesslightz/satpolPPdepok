<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url('assets/backend/css/orgchart.css'); ?>" rel="stylesheet">
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>

  <script>
      var chart = new OrgChart(document.getElementById("tree"), {
          nodeBinding: {
              field_0: "name"
          },
          nodes: [
              { id: 1, name: "Amber McKenzie" },
              { id: 2, pid: 1, name: "Ava Field" },
              { id: 3, pid: 1, name: "Peter Stevens" }
          ]
      });
  </script>
  </head>
  <body>
    <div id="tree"/>
  </body>
</html>
