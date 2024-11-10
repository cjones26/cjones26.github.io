<h2>Introduction</h2>

<?php if ($_SERVER['REQUEST_METHOD'] != 'POST'): ?>
  <form action="" method="post" enctype="multipart/form-data" id="introduction-form">
    <label for="image-url">Image URL:</label>
    <input type="url" id="image-url" name="image-url" value="http://localhost/images/headshot.jpg">

    <label for="image-caption">Image Caption:</label>
    <input type="text" id="image-caption" name="image-caption" value="Charles Jones standing by a brick wall in a park">

    <label for="personal-background">Personal Background:</label>
    <textarea id="personal-background" name="personal-background">I was born in New Jersey back in 1989 before my father moved our family down to North Carolina on Thanksgiving Day 1996. I attended Providence High School class of 2007, where I met my beautiful wife in discrete math class–she had a “discreet” ninja on her binder and I immediately knew she was the one.</textarea>

    <label for="professional-background">Professional Background:</label>
    <textarea id="professional-background" name="professional-background">In high school, I got my first ever job at Old Navy, and after realizing I had no idea what a sequin was (nor any reason to care), I decided I despised working in retail and got a job at Ben &amp; Jerry’s. After working at Ben &amp; Jerry’s for a year or two, I was offered a job by my dad’s girlfriend’s boss, working for a Managed Services Provider (MSP). After nearly seven years of working at the MSP, and building an extremely solid foundation in IT, I decided to leave and get a job as a desktop engineer at Wells Fargo. I remained at Wells Fargo as team lead for nearly a decade,moving into a role as a Cloud Platform Information Security Engineer, before finally settling into my true passion as a frontend Software Engineer. After leaving Wells Fargo, I had a short stint at AvidXchange (which you may recognize if you enjoy live music), before finally moving into my current role at Varo Bank, primarily focusing on our frontend / React Native web technology stack.</textarea>

    <label for="academic-background">Academic Background:</label>
    <textarea id="academic-background" name="academic-background">I’ve been a student at CPCC since 2008–this time, I’m serious, and I’m going to finish my AAS degree!</textarea>

    <label for="subject-background">Background in the Subject Matter of this Course:</label>
    <textarea id="subject-background" name="subject-background">My fascination with computers began all the way back in 1994, when my father brought home a 486DX running MS-DOS 6.0. I began working with HTML in the late ‘90s, tinkering away in Notepad before publishing to GeoCities and Tripod. Shortly thereafter, my interests moved toward desktop applications and I began developing in VB6 before my introduction to C# and the .NET world (thanks RunUO). After working for a Managed Services provider from 2008 to 2013, I finally embraced my passion for development and began a full-time career in the field, specifically the JavaScript / Node.js ecosystem.</textarea>

    <label for="primary-platform">Primary Computer Platform:</label>
    <textarea id="primary-platform" name="primary-platform">Linux — I started out with Gentoo and realized I don’t have the time to compile my entire OS. I shortly moved into utilizing both Slackware and Arch, before finally settling on Mint, which just works. After I got a new laptop, Mint wasn’t doing it for me anymore, so now I use KDE Neon, which isn’t really a real distro but still works great for me.</textarea>

    <label for="courses">Courses I'm Taking and Reason for Each:</label>
    <div id="courses">
      <?php
      $courses = [
        [
          'name' => 'WEB250 - Data Driven Websites',
          'reason' => 'It’s been a long time since I’ve worked with PHP, so I feel that I’m going to really like this course as I remember thoroughly developing on a LAMP stack with PHP a long, long time ago.'
        ],
        [
          'name' => 'WEB115 - Web Markup and Scripting',
          'reason' => 'Though I’ve been a professional frontend developer for almost a decade, it’s always great to refresh on basic markup and scripting.'
        ],
        [
          'name' => 'WEB140 - Web Development Tools',
          'reason' => 'I am very familiar with web development tools, but Wordpress is something I’m sorely lacking in knowledge, and being how widely it’s used, I feel this class will be a great introduction!'
        ]
      ];

      foreach ($courses as $index => $course) {
        echo '<div>';
        echo '<div class="course-container">';
        echo '<input type="text" name="course-name[]" value="' . htmlspecialchars($course['name']) . '">';
        echo '<button class="remove-course" type="button">Remove Course</button>';
        echo '</div>';
        echo '<textarea name="course-reason[]">' . htmlspecialchars($course['reason']) . '</textarea>';
        echo '</div>';
      }
      ?>
    </div>
    <button id="add-course" type="button">Add Course</button>

    <label for=" funny-story">Funny Story or Interesting Item:</label>
    <textarea id="funny-story" name="funny-story">I’m the guy who has been at CPCC since 2008 and still yet to attain my degree.</textarea>

    <label for="travel">Travel:</label>
    <textarea id="travel" name="travel">My wife (a professional opera singer) and I love to travel the world and listen to live music–we went on our belated honeymoon back in May to June, where we had a three week long trip to LA, Hawaii, and all over Japan!</textarea>

    <input type="submit" value="Submit">
  </form>
<?php endif; ?>

<script>
  function addCourse() {
    var div = document.createElement('div');
    div.innerHTML = '<div><div class="course-container"><input type="text" name="course-name[]" placeholder="Course Name"><button type="button" onclick="removeCourse(this)">Remove Course</button></div><textarea name="course-reason[]" placeholder="Reason for taking this course"></textarea></div>';
    document.getElementById('courses').appendChild(div);
  }

  function removeCourse(button) {
    var div = button.parentElement.parentElement;
    div.parentElement.removeChild(div);
  }

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('#add-course').addEventListener('click', addCourse);
  });

  document.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('remove-course')) {
      removeCourse(event.target);
    }
  });
</script>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $image_url = $_POST['image-url'];
  $image_caption = $_POST['image-caption'];
  $personal_background = $_POST['personal-background'];
  $professional_background = $_POST['professional-background'];
  $academic_background = $_POST['academic-background'];
  $subject_background = $_POST['subject-background'];
  $primary_platform = $_POST['primary-platform'];
  $courses = isset($_POST['course-name']) ? $_POST['course-name'] : [];
  $course_reasons = isset($_POST['course-reason']) ? $_POST['course-reason'] : [];
  $funny_story = $_POST['funny-story'];
  $travel = $_POST['travel'];

  echo "<figure id=\"headshot-figure\">";
  echo "<img id=\"headshot\" src='" . htmlspecialchars($image_url) . "' alt='" . htmlspecialchars($image_caption) . "'>";
  echo "<figcaption>" . htmlspecialchars($image_caption) . "</figcaption>";
  echo "</figure>";

  echo "<ul>";

  echo "<li><strong>Personal Background:</strong> " . nl2br(htmlspecialchars($personal_background)) . "</li>";

  echo "<li><strong>Professional Background:</strong> " . nl2br(htmlspecialchars($professional_background)) . "</li>";

  echo "<li><strong>Academic Background:</strong> " . nl2br(htmlspecialchars($academic_background)) . "</li>";

  echo "<li><strong>Background in the Subject Matter of this Course:</strong> " . nl2br(htmlspecialchars($subject_background)) . "</li>";

  echo "<li><strong>Primary Computer Platform:</strong> " . nl2br(htmlspecialchars($primary_platform)) . "</li>";

  echo "<li><strong>Courses and Reasons:</strong><ul>";
  foreach ($courses as $index => $course) {
    echo "<li><strong>" . htmlspecialchars($course) . ":</strong> " . nl2br(htmlspecialchars($course_reasons[$index])) . "</li>";
  }
  echo "</ul></li>";

  echo "<li><strong>Funny Story or Interesting Item:</strong> " . nl2br(htmlspecialchars($funny_story)) . "</li>";

  echo "<li><strong>Travel:</strong> " . nl2br(htmlspecialchars($travel)) . "</li>";

  echo "</ul>";
}
?>