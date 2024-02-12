<form method="post" action="<?php echo Import::route('user'); ?>">
    <input type="text" name="method" hidden value="new">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="fullName" class="form-control" name="fullName" required/>
        <label class="form-label" for="fullName">Full name</label>
    </div>

    <!-- Email input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" id="email" class="form-control" name="email" required/>
        <label class="form-label" for="email">Email address</label>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="password" class="form-control" name="password" required/>
        <label class="form-label" for="password">Password</label>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
</form>