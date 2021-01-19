
function dept_select() {
 var a = document.getElementById("sel_dept").value;
 $.ajax({
  url: 'quary.php',
  type: 'POST',
  async: false,
  data: {
   'aa': 1,
   'a': a,
  },
  success: function (d) {
   $("#course_select").html(d);
  }
 });
};

function staff_select() {
 var a = $("#sel_staff").val();
 $.ajax({
  url: 'staffquery.php',
  type: 'POST',
  async: false,
  data: {
   'aa': 1,
   'a': a,
  },
  success: function (d) {
   $("#lecturer_select").html(d);
  }
 });
};