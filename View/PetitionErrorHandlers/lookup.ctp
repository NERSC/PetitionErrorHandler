<?php
  // It's possible more than one petition in duplicate state is found, so we'll
  // build a list of the duplicate identifiers we've seen.
  
  $dupeIdentifiers = array();
  $name = "name unknown";
  
  if(!empty($vv_petitions[PetitionStatusEnum::Duplicate])) {
    foreach($vv_petitions[PetitionStatusEnum::Duplicate] as $petition) {
      if(!empty($petition['CoPetition']['authenticated_identifier'])) {
        $dupeIdentifiers[] = $petition['CoPetition']['authenticated_identifier'];
      }
      
      if(!empty($petition['EnrolleeCoPerson']['PrimaryName'])) {
        $name = generateCn($petition['EnrolleeCoPerson']['PrimaryName']);
      }
    }
  }
  
  $uniqueDuplicates = array_unique($dupeIdentifiers);
  
  // Is there a NERSC account?
  $isNERSC = false;
  
  foreach($uniqueDuplicates as $d) {
    if(preg_match('/.*@nersc\.gov$/', $d)) {
      $isNERSC = true;
    }
  }
?>
<?php if(empty($dupeIdentifiers)): ?>
<p>
  <b>No duplicate enrollments were found.</b>
</p>
<?php else: // $dupeIdentifiers ?>
  <p>
    <b>You're almost done...</b><br><br>
    ...but somehow you selected your <?php print ($isNERSC ? "NERSC" : "existing"); ?>
    account (<?php print implode(", ", $uniqueDuplicates); ?>), which is already enabled for
    logging in, so we're a little confused. Please click "Try Again" below and
    be sure you <b>select the institution you want to link.</b><br>
    <br>
  </p>
  <div class="row" id="selection-example">
    <img src="https://login-proxy-stage.nersc.gov/fedid/img/selection-example.png" alt="Selection Example">
  </div>
  <div class="row" id="link-identity">
    <div class="col text-center">
      <a href="https://login-proxy-stage.nersc.gov/saml/unsolicited?authId=https%3A%2F%2Fshib.nersc.gov%2Fidp%2Fshibboleth&providerId=https%3A%2F%2Fcomanage-stage.nersc.gov%2Fshibboleth&target=https%3A%2F%2Fcomanage-stage.nersc.gov%2Fregistry%2Fco_petitions%2Fstart%2Fcoef%3A24" class="btn btn-primary btn-lg" role="button">Try Again</a>
    </div>
  </div>
<?php endif; // $dupeIdentifiers