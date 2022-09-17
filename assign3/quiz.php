<?php
session_start();
include_once "connect-to-sql.php";
$sql = "SELECT * FROM quizs ORDER BY display_order ASC";
$result = $connection->query($sql);

$rows_part_1 = array();
$rows_part_2 = array();
$pattern = "__________";

while ($row = $result->fetch_assoc()) {
  $answer = "";
  if ($row['question_type'] == 1) { // radio button ~ single choice
    $content = '<p class="bold">' . $row['content'] . '</p> <p>Please select your answer:</p>';
    $temp_answers = explode($pattern, $row['answers']);
    for ($i = 0; $i < count($temp_answers); $i++) {
      $answer = $answer . ' <input type="radio" name="' . 0 . '" id="' . $row['id'] . '" value="' . trim($temp_answers[$i]) . '" required="required" /><label>' . $temp_answers[$i] . '</label><br />';
    }
  } else if ($row['question_type'] == 2) { // multi choice
    $content = '<p class="bold">' . $row['content'] . '</p>';
    $temp_answers = explode($pattern, $row['answers']);
    for ($i = 0; $i < count($temp_answers); $i++) {
      $answer = $answer . ' <input type="checkbox" name="' . $i . '" id="' . $row['id'] . '" value="' . trim($temp_answers[$i]) . '" /><label>' . $temp_answers[$i] . '</label><br />';
    }
  } else if ($row['question_type'] == 3) { // checkbox
    $content = '<p class="bold">' . $row['content'] . '</p>';
    $answer = $answer . '<select name="0" id="' . $row['id'] . '" required="required"> <option value="">Please select</option>';
    $temp_answers = explode($pattern, $row['answers']);
    for ($i = 0; $i < count($temp_answers); $i++) {
      $answer = $answer . ' <option value="' . $temp_answers[$i] . '">' . $temp_answers[$i] . ' </option>';
    }
    $answer = $answer . ' </select>';
  } else if ($row['question_type'] == 4) { // input text
    $content = "";
    $arr_content = explode(" ", $row['content']);
    $j = 0;
    for ($i = 0; $i < count($arr_content); $i++) {
      if ($arr_content[$i] == $pattern) {
        $arr_content[$i] = ' <input type="text" name="' . $j . '" id="' . $row['id'] . '" required="required" /> <br />';
        $j = $j + 1;
      }
      $content = $content . " " . $arr_content[$i];
    }
    $content = $content . " <br />";
  }

  if ($row['question_type'] == 4) {
    $rows_part_2[] = array(
      'id' => $row['id'],
      'content'  => $content,
      'answers'  => $answer
    );
  } else {
    $rows_part_1[] = array(
      'id' => $row['id'],
      'content'  => $content,
      'answers'  => $answer
    );
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'header.inc'; ?>
</head>

<body>
<?php include 'menu.inc'; ?>

  <div class="fieldset">
    <!-- <form method="post" action="result.html" id="quiz_form"> -->
    <form name="myForm" onsubmit="return validateMyForm();">
      <h2 class="QUIZ">QUIZ !!!!</h2>
      <p>Let's play a game to see your VoiceXML knowledge level</p>

      <fieldset>
        <legend class="light_red">Personal Information</legend>
        <p>
          <label for="id">Student ID </label>
          <input type="text" name="student id" id="id" required="required" pattern="[0-9]{7,10}" title="ID must contain between 7 and 10 digits" />
        </p>
        <p>
          <label for="givenname">Given Name</label>
          <input type="text" name="given name" id="givenname" required="required" pattern="[A-Za-z\s_-]{1,30}" title="Maximum 30 characters and alphabet only" />
          <br />
          <br />
          <label for="familyname">Family Name</label>
          <input type="text" name="family name" id="familyname" required="required" pattern="[A-Za-z\s_-]{1,30}" title="Maximum 30 characters and alphabet only" />
        </p>
        <p>
          <label for="email">Your email </label>
          <input type="email" name="email" id="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="characters@characters.domain" />
        </p>
      </fieldset>

      <br />
      <br />
      <fieldset>
        <legend class="light_red">Quiz</legend>

        <p class="light_blue">Click "Start" before doing the quiz!!!</p>
        <p class="light_blue">
          Time: <span id="timer"> 10:00 </span>
          <button id="start">Start</button>
        </p>

        <p class="light_blue">
          Part 1: Multiple choices - Choose the right answer(s).
        </p>

        <?php
        foreach ($rows_part_1 as $row) {
        ?>
          <div id="q1">
            <?php echo $row['content']; ?>
            <?php echo $row['answers']; ?>
          </div>
        <?php
        }
        ?>
      </fieldset>

      <fieldset>
        <p class="light_blue">Part 2: Short answers - Fill in the blanks.</p>
        <?php
        foreach ($rows_part_2 as $row) {
        ?>
          <div id="q1">
            <?php echo $row['content']; ?>
            <?php echo $row['answers']; ?>
          </div>
        <?php
        }
        ?>
      </fieldset>

      <button id="btn-submit">Submit</button>
      <input type="reset" value="Reset answers" />
    </form>
  </div>

  <footer>
  <?php include 'footer.inc'; ?>
  </footer>
  <script src="scripts/sweetalert.min.js"></script>
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/quiz.js"></script>
  <script>
    function validateMyForm() {
      return false;
    }

    const submitPractice = {};
    $("input").change(function() {
      if (this.type == 'checkbox') {
        if (!submitPractice[this.id]) {
          submitPractice[this.id] = [];
        }
        if (this.checked) {
          submitPractice[this.id].push((this.value || '').trim());
        } else {
          let tempArr = [];
          for (let item of submitPractice[this.id]) {
            if (item == this.value) {
              continue;
            }
            tempArr.push(item);
          }
          submitPractice[this.id] = tempArr;
        }
      } else {
        if (!+this.id) return;
        if (!submitPractice[this.id]) {
          submitPractice[this.id] = [];
        }
        submitPractice[this.id][this.name] = (this.value || '').trim();
      }
      console.log(submitPractice);
    });

    $("select").on("change", function() {
      if (!+this.id) return;
      if (!submitPractice[this.id]) {
        submitPractice[this.id] = [];
      }
      submitPractice[this.id][this.name] = (this.value || '').trim();
      console.log(submitPractice);
    });

    $("radio").on("change", function() {
      if (!+this.id) return;
      if (!submitPractice[this.id]) {
        submitPractice[this.id] = [];
      }
      submitPractice[this.id][this.name] = (this.value || '').trim();
      console.log(submitPractice);
    });

    function validateEmail(email) {
      return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
    };

    $("#btn-submit").click(function() {
      validate();
      const id = document.getElementById("id").value;
      const email = document.getElementById("email").value;
      const givenname = document.getElementById("givenname").value;
      const familyname = document.getElementById("familyname").value;
      
      // regex //

      const flag = true;
      if (!id || !email || !givenname || !familyname) {
        flag = false;
        alert("Please fill your information");
        return false;
      }

      let pattern = /[A-Za-z\s_-]/;
      if (!pattern.test(givenname)) {
        alert("Given name must alphabet only");
        flag = false;
        return false;
      }

      if (givenname.length > 30) {
        flag = false;
        alert("Given name must maximum 30 character");
        return false;
      }

      if (!pattern.test(familyname)) {
        flag = false;
        alert("Family name must alphabet only");
        return false;
      }

      if (familyname.length > 30) {
        flag = false;
        alert("Family name must maximum 30 character");
        return false;
      }

      if (!validateEmail(email)) {
        flag = false;
        alert("Email is invalid");
        return false;
      }

      if (flag) {
        const form_data = new FormData();
        form_data.append("id", id);
        form_data.append("email", email);
        form_data.append("givenname", givenname);
        form_data.append("familyname", familyname);
        form_data.append("submitPractice", JSON.stringify(submitPractice));
        $.ajax({
          type: "POST",
          url: "markquiz.php",
          data: form_data,
          contentType: false,
          processData: false,
          success: function(response) {
            let res = response;
            // let res = {};
            // try {
            //   res = JSON.parse(response);
            // } catch (error) {
            //   console.log(error)
            //   res = response;
            // }
            if (res.success) {
              window.location.href = "result.php" + `?student_id=${res.student_id}`;
            } else {
              swal({
                title: "Fail!",
                text: res.message || "Submit error!",
                icon: "error",
                buttons: false,
                timer: 5000,
              });
            }
          },
        });
      }

    });
  </script>
</body>

</html>