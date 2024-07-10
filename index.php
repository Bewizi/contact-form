<?php

session_start();
$errors = $_SESSION['errors'] ?? [];
$formData = $_SESSION['formData'] ?? [];

unset($_SESSION['errors'], $_SESSION['formData']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon-32x32.png" />

  <!-- TAILWIND CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Frontend Mentor | Contact form</title>

  <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
  <style>
    .attribution {
      font-size: 11px;
      text-align: center;
    }

    .attribution a {
      color: hsl(228, 45%, 44%);
    }
  </style>
</head>

<body class="bg-green-200/50">
  <main class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
      <h1 class="text-2xl font-bold mb-6 text-center">
        Contact Us
      </h1>

      <form action="contactus-form.php" method="post" autocomplete="off">

        <!-- div wrapping input firstname and lastname -->
        <div class="flex flex-wrap justify-between items-center">

          <!-- firstname -->
          <div class="mb-4">
            <label for="firstname" class="inline-block mb-2 text-sm font-medium text-gray-700">First Name *</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="Firstname" value="<?= htmlspecialchars($formData['firstname'] ?? '') ?>" class=" block  rounded-md border <?= isset($errors['firstname']) ? 'border-red-500' : 'border-gray-300' ?>  shadow-sm focus:border-green-300 hover:border-green-500  cursor-pointer outline-none py-2 px-1 w-[18rem]  text-lg mb-2" />
            <?php if (isset($errors['firstname'])) : ?>
              <span class="text-red-500"><?= $errors['firstname'] ?></span>
            <?php endif; ?>
          </div>
          <!--end of firstname -->

          <!-- lastname -->
          <div class="mb-4 ">
            <label for="lastname" class="inline-block mb-2 text-sm font-medium text-gray-700">Last Name *</label><br>
            <input type="text" name="lastname" id="lastname" placeholder="Lastname" value="<?= htmlspecialchars($formData['lastname'] ?? '') ?>" class=" block  rounded-md border <?= isset($errors['lastname']) ? 'border-red-500' : 'border-gray-300' ?> shadow-sm focus:border-green-300 hover:border-green-500  cursor-pointer outline-none py-2 px-1 w-[18rem] text-lg mb-2" />

            <?php if (isset($errors['lastname'])) : ?>
              <span class="text-red-500"><?= $errors['lastname'] ?></span>
            <?php endif; ?>
          </div>
          <!--end of lastname -->
        </div>
        <!-- end of div wrapping input firstname and lastname -->


        <!-- email address -->
        <div class="mb-4">
          <label for="email" class="inline-block mb-2 text-sm font-medium text-gray-700">Email Address *</label> <br />
          <input type="text" name="email" id="email" placeholder="Enter Your Email Address" value="<?= htmlspecialchars($formData['email'] ?? '') ?>" class=" block  rounded-md border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?> shadow-sm focus:border-green-300 hover:border-green-500  cursor-pointer outline-none py-2 px-1 w-full text-lg mb-2" />
          <?php if (isset($errors['email'])) : ?>
            <span class="text-red-500"><?= $errors['email'] ?></span>
          <?php endif; ?>
        </div>
        <!-- end of email address -->


        <!-- query type -->
        <div class="mb-4">
          <label for="query_type" class="block text-sm font-medium text-gray-700">Query Type *</label>
          <div class="mt-2 flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center border-2 border-gray-300 rounded-md py-1.5 px-5 cursor-pointer hover:bg-green-200/50 active:bg-green-200/50 focus:bg-green-200/50 w-[15rem] ">
              <input type="radio" name="query_type" value="general" class="form-radio text-indigo-600 " <?= (isset($formData['query_type']) && $formData['query_type'] === 'general') ? 'checked' : ''; ?>>
              <span class="ml-2">General Enquiry</span>
            </div>
            <div class="flex items-center ml-6 border-2 border-gray-300 rounded-md py-1.5 px-5 cursor-pointer hover:bg-green-200/50 active:bg-green-200/50 focus:bg-green-200/50 w-[15rem]">
              <input type="radio" name="query_type" value="support" class="form-radio text-indigo-600 " <?= (isset($formData['query_type']) && $formData['query_type'] === 'support') ? 'checked' : ''; ?>>
              <span class="ml-2 ">Support Request</span>
            </div>
          </div>
          <?php if (isset($errors['query_type'])) : ?>
            <span class="text-red-500"><?= $errors['query_type'] ?></span>
          <?php endif; ?>
        </div>
        <!-- end of query type -->

        <!-- message -->
        <div class="mb-4">
          <label for="user_message" class="inline-block mb-2 text-sm font-medium text-gray-700">Message *</label><br>
          <textarea name="user_message" id="user_message" cols="30" rows="2" placeholder="Message" class="block  rounded-md border <?= isset($errors['user_message']) ? 'border-red-500' : 'border-gray-300' ?> shadow-sm focus:border-green-300 hover:border-green-500  cursor-pointer outline-none py-2 px-1 w-full text-lg mb-2"><?= htmlspecialchars($formData['user_message'] ?? '') ?></textarea>
          <?php if (isset($errors['user_message'])) : ?>
            <span class="text-red-500"><?= $errors['user_message'] ?></span>
          <?php endif; ?>
        </div>
        <!-- end of message -->


        <!-- consent -->
        <section class="mb-4">
          <div class="flex items-center">
            <input type="checkbox" name="consent" class="form-checkbox text-indigo-600" <?= isset($formData['consent']) ? 'checked' : ''; ?>>
            <span class="ml-2 text-base text-gray-400">I consent to being contacted by the team *</span>
          </div>
          <?php if (isset($errors['consent'])) : ?>
            <span class="text-red-500 inline-block"><?= $errors['consent'] ?></span>
          <?php endif; ?>
        </section>

        <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Submit</button>
      </form>
    </div>
  </main>

  <div class="attribution">
    Challenge by
    <a href="https://www.frontendmentor.io?ref=challenge">Frontend Mentor</a>.
    Coded by <a href="#">Toluwalase Using Php</a>.
  </div>


</body>

</html>