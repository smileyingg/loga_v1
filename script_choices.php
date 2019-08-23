<!-- Q1. -->
<script>
  // One
  $(document).ready(function() {
    $('.One').on('change', function() {
      $('.One').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Three
  $(document).ready(function() {
    $('.Three').on('change', function() {
      $('.Three').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Four
  $(document).ready(function() {
    $('.Four').on('change', function() {
      $('.Four').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Six
  $(document).ready(function() {
    $('.Six').on('change', function() {
      $('.Six').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Seven
  $(document).ready(function() {
    $('.Seven').on('change', function() {
      $('.Seven').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Eight
  $(document).ready(function() {
    $('.Eight').on('change', function() {
      $('.Eight').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Nine
  $(document).ready(function() {
    $('.Nine').on('change', function() {
      $('.Nine').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Ten
  $(document).ready(function() {
    $('.Ten').on('change', function() {
      $('.Ten').not(this).prop('checked', false);
      $('#result').html($(this).data("id"));
      if ($(this).is(":checked"))
        $('#result').html($(this).data("id"));
      else
        $('#result').html('Empty...!');
    });
  });

  // Q1
  function Q1_C5() {
    var ck = document.getElementById('q1_c5');
    if (ck.checked == true) {
      document.getElementById('txt_q1_c5').style.display = "";
      document.getElementById('txt_q1_c5').focus();
      document.getElementById('txt_q1_c5').required = true;

    } else {
      document.getElementById('txt_q1_c5').style.display = "none";
      document.getElementById('txt_q1_c5').value = "";
      document.getElementById('txt_q1_c5').required = false;
    }
  }

  function Q1() {
    document.getElementById('txt_q1_c5').style.display = "none";
    document.getElementById('txt_q1_c5').value = "";
  }
  // End Q1 
</script>


<!-- Q2. -->
<!-- นำเข้า Javascript jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script>
  $(function() {

    //เรียกใช้งาน Select2
    // $(".select2-single").select2();

    //ดึงข้อมูล province จากไฟล์ get_data.php
    $.ajax({
      url: "get_data.php",
      dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
      data: {
        show_province: 'show_province'
      }, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
      success: function(data) {

        //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
        $.each(data, function(index, value) {
          //แทรก Elements ใน id province  ด้วยคำสั่ง append
          $("#province").append("<option value='" + value.id + "'> " + value.name + "</option>");
          $("#amphur").text("");
        });
      }
    });

    //แสดงข้อมูล อำเภอ  โดยใช้คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่ #province
    $("#province").change(function() {

      //กำหนดให้ ตัวแปร province มีค่าเท่ากับ ค่าของ #province ที่กำลังถูกเลือกในขณะนั้น
      var province_id = $(this).val();

      $.ajax({
        url: "get_data.php",
        dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
        data: {
          province_id: province_id
        }, //ส่งค่าตัวแปร province_id เพื่อดึงข้อมูล อำเภอ ที่มี province_id เท่ากับค่าที่ส่งไป
        success: function(data) {

          //กำหนดให้ข้อมูลใน #amphur เป็นค่าว่าง
          $("#amphur").text("");

          //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data  
          $.each(data, function(index, value) {

            //แทรก Elements ข้อมูลที่ได้  ใน id amphur  ด้วยคำสั่ง append
            $("#amphur").append("<option value='" + value.id + "'> " + value.name + "</option>");
          });
        }
      });

    });

    //คำสั่ง change จะทำงานกรณีมีการเปลี่ยนแปลงที่  #district 
    $("#district").change(function() {

      //นำข้อมูลรายการ จังหวัด ที่เลือก มาใส่ไว้ในตัวแปร province
      var province = $("#province option:selected").text();

      //นำข้อมูลรายการ อำเภอ ที่เลือก มาใส่ไว้ในตัวแปร amphur
      var amphur = $("#amphur option:selected").text();

    });
  });
</script>
<!-- End Q2. -->

<script>
  // Q3. 
  function Q3_C5() {
    var ck = document.getElementById('q3_c5');
    if (ck.checked == true) {
      document.getElementById('txt_q3_c5').style.display = "";
      document.getElementById('txt_q3_c5').focus();
      document.getElementById('txt_q3_c5').required = true;

    } else {
      document.getElementById('txt_q3_c5').style.display = "none";
      document.getElementById('txt_q3_c5').value = "";
      document.getElementById('txt_q3_c5').required = false;
    }
  }

  function Q3() {
    document.getElementById('txt_q3_c5').style.display = "none";
    document.getElementById('txt_q3_c5').value = "";
  }
  // End Q3

  // Q4
  function Q4_C5() {
    var ck = document.getElementById('q4_c5');
    if (ck.checked == true) {
      document.getElementById('txt_q4_c5').style.display = "";
      document.getElementById('txt_q4_c5').focus();
      document.getElementById('txt_q4_c5').required = true;

    } else {
      document.getElementById('txt_q4_c5').style.display = "none";
      document.getElementById('txt_q4_c5').value = "";
      document.getElementById('txt_q4_c5').required = false;
    }
  }

  function Q4() {
    document.getElementById('txt_q4_c5').style.display = "none";
    document.getElementById('txt_q4_c5').value = "";
  }
  // End Q4

  // Q5
  function Q5_C11() {
    if (document.getElementById("q5_c11").checked) {
      // เอา checked ออก
      document.getElementById("q5_c1").checked = false;
      document.getElementById("q5_c2").checked = false;
      document.getElementById("q5_c3").checked = false;
      document.getElementById("q5_c4").checked = false;
      document.getElementById("q5_c5").checked = false;
      document.getElementById("q5_c6").checked = false;
      document.getElementById("q5_c7").checked = false;
      document.getElementById("q5_c8").checked = false;
      document.getElementById("q5_c9").checked = false;
      document.getElementById("q5_c10").checked = false;
      // ไม่ให้ check เพิ่ม
      document.getElementById("q5_c1").disabled = true;
      document.getElementById("q5_c2").disabled = true;
      document.getElementById("q5_c3").disabled = true;
      document.getElementById("q5_c4").disabled = true;
      document.getElementById("q5_c5").disabled = true;
      document.getElementById("q5_c6").disabled = true;
      document.getElementById("q5_c7").disabled = true;
      document.getElementById("q5_c8").disabled = true;
      document.getElementById("q5_c9").disabled = true;
      document.getElementById("q5_c10").disabled = true;
    } else {
      document.getElementById("q5_c1").disabled = false;
      document.getElementById("q5_c2").disabled = false;
      document.getElementById("q5_c3").disabled = false;
      document.getElementById("q5_c4").disabled = false;
      document.getElementById("q5_c5").disabled = false;
      document.getElementById("q5_c6").disabled = false;
      document.getElementById("q5_c7").disabled = false;
      document.getElementById("q5_c8").disabled = false;
      document.getElementById("q5_c9").disabled = false;
      document.getElementById("q5_c10").disabled = false;
    }
  }
  // End Q5

  // Q6
  function Q6_C4() {
    var ck = document.getElementById('q6_c4');
    if (ck.checked == true) {
      document.getElementById('txt_q6_c4').style.display = "";
      document.getElementById('txt_q6_c4').focus();
      document.getElementById('txt_q6_c4').required = true;

    } else {
      document.getElementById('txt_q6_c4').style.display = "none";
      document.getElementById('txt_q6_c4').value = "";
      document.getElementById('txt_q6_c4').required = false;
    }
  }

  function Q6() {
    document.getElementById('txt_q6_c4').style.display = "none";
    document.getElementById('txt_q6_c4').value = "";
  }
  // End Q6

  // Q8
  function Q8_C5() {
    var ck = document.getElementById('q8_c5');
    if (ck.checked == true) {
      document.getElementById('txt_q8_c5').style.display = "";
      document.getElementById('txt_q8_c5').focus();
      document.getElementById('txt_q8_c5').required = true;

    } else {
      document.getElementById('txt_q8_c5').style.display = "none";
      document.getElementById('txt_q8_c5').value = "";
      document.getElementById('txt_q8_c5').required = false;
    }
  }

  function Q8() {
    document.getElementById('txt_q8_c5').style.display = "none";
    document.getElementById('txt_q8_c5').value = "";
  }
  // End Q8

  // Q9
  function Q9_C5() {
    var ck = document.getElementById('q9_c5');
    if (ck.checked == true) {
      document.getElementById('txt_q9_c5').style.display = "";
      document.getElementById('txt_q9_c5').focus();
      document.getElementById('txt_q9_c5').required = true;

    } else {
      document.getElementById('txt_q9_c5').style.display = "none";
      document.getElementById('txt_q9_c5').value = "";
      document.getElementById('txt_q9_c5').required = false;
    }
  }

  function Q9() {
    document.getElementById('txt_q9_c5').style.display = "none";
    document.getElementById('txt_q9_c5').value = "";
  }
  // End Q9
  
</script>


