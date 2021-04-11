<?php $this->extend('mainlayout') ?>
<?php $this->block('title',$title) ?>

<?php // START CONTENT ?>
<?php // WHAT FOLLOWS IS RECEIVED BY mainlayout as $this['content] ?>
        <div class="px-4 border-bottom">
            <h1 class="display-4 fw-bold text-center">Add to Calendar Buttons</h1>
            <div class="col-lg-8 mx-auto mb-5">
                <p class="lead mb-4 text-center">
                    I got tired of having to rewrite this code so many times. So I built this tool.
                </p>
                <p class="lead mb-4 text-center">
                    Fill out the form below, and get in return URLs for adding this event to <b>Google<sup>TM</sup></b> and <b>Apple<sup>TM</sup></b> Calendars.  Use it if you'd like.  Hope it works for you.
                </p>
                <p class="lead mb-4 text-center">
                    If you don't see a calendar icon to select your date/time fields, it's because I'm lazy and implemented a feature that seems to only be available on Chrome.
                </p>
                <form action="/addevent" method="POST}">
                    <div class="form-group">
                        <label for="subject"><b>Subject</b></b></label>
                        <input type="text" class="form-control" id="subject" name="subject" aria-describedby="subjectHelp" placeholder="Subject" required>
                        <small id="subjectHelp" class="form-text text-muted">The title of your event</small>
                    </div>
                    <div class="form-group">
                        <label for="start"><b>Start</b></label>
                        <input type="datetime-local" class="form-control" id="start" name="start" placeholder="" aria-describedby="startHelp" required>
                        <small id="startHelp" class="form-text text-muted">The start date and time of your event in format (YYYY-MM-DD HH:MM:SS)</small>
                    </div>
                    <div class="form-group">
                        <label for="end"><b>End</b></label>
                        <input type="datetime-local" class="form-control" id="end" name="end" placeholder="" aria-describedat="endHelp" required>
                        <small id="endHelp" class="form-text text-muted">The end date and time of your eventin format (YYYY-MM-DD HH:MM:SS)</small>
                    </div>
                    <div class="form-group">
                        <label for="tz"><b>Timezone</b></label>
                        <input type="text" class="form-control" id="timezone" name="timezone" placeholder="Timezone" aria-describedat="tzHelp" required>
                        <small id="tzHelp" class="form-text text-muted">The timezone for the above dates</small>
                    </div>
                    <div class="form-group">
                        <label for="details"><b>Details</b></label>
                        <input type="text" class="form-control" id="details" name="details" placeholder="Details" aria-describedat="detailsHelp" maxlength="75" required>
                        <small id="detailsHelp" class="form-text text-muted">The description for your event</small>
                    </div>
                    <div class="form-group">
                        <label for="location"><b>Location</b></label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Location" aria-describedat="locHelp" required>
                        <small id="locHelp" class="form-text text-muted">The location or address for this event</small>
                    </div>
                    <div class="form-group">
                        <label for="url"><b>Url</b></label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Optional Url" aria-describedat="urlHelp">
                        <small id="urlHelp" class="form-text text-muted">A URL associated to this event.  Automatically added to the event's description</small>
                    </div>
                    <div class="text-center my-5"><button type="submit" class="btn btn-primary">Get your calendar buttons!</button></div>
                </form>
            </div>
        </div>
<?php // END CONTENT ?>
