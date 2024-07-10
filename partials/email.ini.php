<!-- email address -->
<?php if (isset($_GET['emailError'])) : ?>
  <label for="email">Email Address *</label> <br />
  <input type="text" name="email" id="email" placeholder="Enter Your Email Address" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>" class="border-2 <?= !empty($_GET['emailError']) ? 'border-red-500' : '' ?>" /> <br>
  <span id="emailError" class="text-red-500">
    <?= !empty($_GET['emailError']) ? $_GET['emailError'] : ''; ?>
  </span> <br>
<?php else : ?>
  <label for="email">Email Address *</label> <br />
  <input type="text" name="email" id="email" placeholder="Enter Your Email Address" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>" class="border-2 'border-gray-300' " /> <br>
  <span id="emailError" class="text-red-500">
    <?= !empty($_GET['emailError']) ? $_GET['emailError'] : ''; ?>
  </span> <br>
<?php endif; ?>
<!-- end of email address -->