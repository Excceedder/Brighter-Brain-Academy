<?php

if ($_GET["class_placement"] == "Pre Kindergarten") {
?>
    <tr>
        <td>Literacy</td>
        <td><input type="text" name="literacy_first_ca_score" value="<?php echo $termly_report_data["literacy_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literacy_second_ca_score" value="<?php echo $termly_report_data["literacy_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literacy_examination_score" value="<?php echo $termly_report_data["literacy_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Numeracy</td>
        <td><input type="text" name="numeracy_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["numeracy_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="numeracy_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["numeracy_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="numeracy_examination_score" placeholder="0" value="<?php echo $termly_report_data["numeracy_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Hand Writing</td>
        <td><input type="text" name="hand_writing_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="hand_writing_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="hand_writing_examination_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Rhymes</td>
        <td><input type="text" name="rhymes_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="rhymes_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="rhymes_examination_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Coloring</td>
        <td><input type="text" name="coloring_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["coloring_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="coloring_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["coloring_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="coloring_examination_score" placeholder="0" value="<?php echo $termly_report_data["coloring_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Practcal Life</td>
        <td><input type="text" name="practcal_life_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="practcal_life_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="practcal_life_examination_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Social Habits</td>
        <td><input type="text" name="social_habits_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="social_habits_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="social_habits_examination_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_examination_score"] ?>" class="form-control"></td>
    </tr>
<?php
} else if ($_GET["class_placement"] == "Kindergarten 1" || $_GET["class_placement"] == "Kindergarten 2" || $_GET["class_placement"] == "Kindergarten 3") {
?>
    <tr>
        <td>English Language</td>
        <td><input type="text" name="english_language_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["english_language_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="english_language_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["english_language_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="english_language_examination_score" placeholder="0" value="<?php echo $termly_report_data["english_language_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Mathematics</td>
        <td><input type="text" name="mathematics_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["mathematics_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="mathematics_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["mathematics_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="mathematics_examination_score" placeholder="0" value="<?php echo $termly_report_data["mathematics_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Practcal Life</td>
        <td><input type="text" name="practcal_life_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="practcal_life_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="practcal_life_examination_score" placeholder="0" value="<?php echo $termly_report_data["practcal_life_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Nature Studies</td>
        <td><input type="text" name="nature_studies_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["nature_studies_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="nature_studies_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["nature_studies_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="nature_studies_examination_score" placeholder="0" value="<?php echo $termly_report_data["nature_studies_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Christian Religious Studies</td>
        <td><input type="text" name="christian_religious_studies_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_examination_score" placeholder="0" value="<?php echo $termly_report_data["christian_religious_studies_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Health Habits</td>
        <td><input type="text" name="health_habits_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["health_habits_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="health_habits_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["health_habits_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="health_habits_examination_score" placeholder="0" value="<?php echo $termly_report_data["health_habits_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Social Habits</td>
        <td><input type="text" name="social_habits_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="social_habits_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="social_habits_examination_score" placeholder="0" value="<?php echo $termly_report_data["social_habits_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Hand Writing</td>
        <td><input type="text" name="hand_writing_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="hand_writing_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="hand_writing_examination_score" placeholder="0" value="<?php echo $termly_report_data["hand_writing_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Rhymes</td>
        <td><input type="text" name="rhymes_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="rhymes_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="rhymes_examination_score" placeholder="0" value="<?php echo $termly_report_data["rhymes_examination_score"] ?>" class="form-control"></td>
    </tr>
    <tr>
        <td>Coloring</td>
        <td><input type="text" name="coloring_first_ca_score" placeholder="0" value="<?php echo $termly_report_data["coloring_first_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="coloring_second_ca_score" placeholder="0" value="<?php echo $termly_report_data["coloring_second_ca_score"] ?>" class="form-control"></td>
        <td><input type="text" name="coloring_examination_score" placeholder="0" value="<?php echo $termly_report_data["coloring_examination_score"] ?>" class="form-control"></td>
    </tr>
<?php
} else if ($_GET["class_placement"] == "Primary 1" || $_GET["class_placement"] == "Primary 2") {
?>
    <tr>
        <td>English Language</td>
        <td><input type="text" name="english_language_first_ca_score" value="<?php echo $termly_report_data["english_language_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_second_ca_score" value="<?php echo $termly_report_data["english_language_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_examination_score" value="<?php echo $termly_report_data["english_language_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Mathematics</td>
        <td><input type="text" name="mathematics_first_ca_score" value="<?php echo $termly_report_data["mathematics_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_second_ca_score" value="<?php echo $termly_report_data["mathematics_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_examination_score" value="<?php echo $termly_report_data["mathematics_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Civic Education</td>
        <td><input type="text" name="civic_education_first_ca_score" value="<?php echo $termly_report_data["civic_education_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="civic_education_second_ca_score" value="<?php echo $termly_report_data["civic_education_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="civic_education_examination_score" value="<?php echo $termly_report_data["civic_education_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Computer Studies</td>
        <td><input type="text" name="computer_studies_first_ca_score" value="<?php echo $termly_report_data["computer_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="computer_studies_second_ca_score" value="<?php echo $termly_report_data["computer_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="computer_studies_examination_score" value="<?php echo $termly_report_data["computer_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Literature</td>
        <td><input type="text" name="literature_first_ca_score" value="<?php echo $termly_report_data["literature_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literature_second_ca_score" value="<?php echo $termly_report_data["literature_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literature_examination_score" value="<?php echo $termly_report_data["literature_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Physical Health Education</td>
        <td><input type="text" name="physical_health_education_first_ca_score" value="<?php echo $termly_report_data["physical_health_education_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="physical_health_education_second_ca_score" value="<?php echo $termly_report_data["physical_health_education_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="physical_health_education_examination_score" value="<?php echo $termly_report_data["physical_health_education_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Christian Religious Studies</td>
        <td><input type="text" name="christian_religious_studies_first_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_second_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_examination_score" value="<?php echo $termly_report_data["christian_religious_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Hand Writing</td>
        <td><input type="text" name="hand_writing_first_ca_score" value="<?php echo $termly_report_data["hand_writing_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="hand_writing_second_ca_score" value="<?php echo $termly_report_data["hand_writing_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="hand_writing_examination_score" value="<?php echo $termly_report_data["hand_writing_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Basic Technology</td>
        <td><input type="text" name="basic_technology_first_ca_score" value="<?php echo $termly_report_data["basic_technology_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_technology_second_ca_score" value="<?php echo $termly_report_data["basic_technology_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_technology_examination_score" value="<?php echo $termly_report_data["basic_technology_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Basic Science</td>
        <td><input type="text" name="basic_science_first_ca_score" value="<?php echo $termly_report_data["basic_science_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_second_ca_score" value="<?php echo $termly_report_data["basic_science_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_examination_score" value="<?php echo $termly_report_data["basic_science_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Social Studies</td>
        <td><input type="text" name="social_studies_first_ca_score" value="<?php echo $termly_report_data["social_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="social_studies_second_ca_score" value="<?php echo $termly_report_data["social_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="social_studies_examination_score" value="<?php echo $termly_report_data["social_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Home Economics</td>
        <td><input type="text" name="home_economics_first_ca_score" value="<?php echo $termly_report_data["home_economics_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="home_economics_second_ca_score" value="<?php echo $termly_report_data["home_economics_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="home_economics_examination_score" value="<?php echo $termly_report_data["home_economics_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Creative Arts</td>
        <td><input type="text" name="creative_arts_first_ca_score" value="<?php echo $termly_report_data["creative_arts_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="creative_arts_second_ca_score" value="<?php echo $termly_report_data["creative_arts_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="creative_arts_examination_score" value="<?php echo $termly_report_data["creative_arts_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Agricultural Science</td>
        <td><input type="text" name="agricultural_science_first_ca_score" value="<?php echo $termly_report_data["agricultural_science_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="agricultural_science_second_ca_score" value="<?php echo $termly_report_data["agricultural_science_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="agricultural_science_examination_score" value="<?php echo $termly_report_data["agricultural_science_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
<?php
} else if ($_GET["class_placement"] == "Primary 3" || $_GET["class_placement"] == "Primary 4" || $_GET["class_placement"] == "Primary 5") {
?>
    <tr>
        <td>English Language</td>
        <td><input type="text" name="english_language_first_ca_score" value="<?php echo $termly_report_data["english_language_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_second_ca_score" value="<?php echo $termly_report_data["english_language_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_examination_score" value="<?php echo $termly_report_data["english_language_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Mathematics</td>
        <td><input type="text" name="mathematics_first_ca_score" value="<?php echo $termly_report_data["mathematics_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_second_ca_score" value="<?php echo $termly_report_data["mathematics_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_examination_score" value="<?php echo $termly_report_data["mathematics_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Christian Religious Studies</td>
        <td><input type="text" name="christian_religious_studies_first_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_second_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_examination_score" value="<?php echo $termly_report_data["christian_religious_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Creative Arts</td>
        <td><input type="text" name="creative_arts_first_ca_score" value="<?php echo $termly_report_data["creative_arts_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="creative_arts_second_ca_score" value="<?php echo $termly_report_data["creative_arts_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="creative_arts_examination_score" value="<?php echo $termly_report_data["creative_arts_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Basic Science & Technology</td>
        <td><input type="text" name="basic_science_and_technology_first_ca_score" value="<?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_and_technology_second_ca_score" value="<?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_and_technology_examination_score" value="<?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>National Values</td>
        <td><input type="text" name="national_values_first_ca_score" value="<?php echo $termly_report_data["national_values_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="national_values_second_ca_score" value="<?php echo $termly_report_data["national_values_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="national_values_examination_score" value="<?php echo $termly_report_data["national_values_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Pre Vocational Studies</td>
        <td><input type="text" name="pre_vocational_studies_first_ca_score" value="<?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="pre_vocational_studies_second_ca_score" value="<?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="pre_vocational_studies_examination_score" value="<?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>History</td>
        <td><input type="text" name="history_first_ca_score" value="<?php echo $termly_report_data["history_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="history_second_ca_score" value="<?php echo $termly_report_data["history_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="history_examination_score" value="<?php echo $termly_report_data["history_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
<?php
} else if ($_GET["class_placement"] == "JSS. 1" || $_GET["class_placement"] == "JSS. 2" || $_GET["class_placement"] == "JSS. 3") {
?>
    <tr>
        <td>English Language</td>
        <td><input type="text" name="english_language_first_ca_score" value="<?php echo $termly_report_data["english_language_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_second_ca_score" value="<?php echo $termly_report_data["english_language_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="english_language_examination_score" value="<?php echo $termly_report_data["english_language_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Mathematics</td>
        <td><input type="text" name="mathematics_first_ca_score" value="<?php echo $termly_report_data["mathematics_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_second_ca_score" value="<?php echo $termly_report_data["mathematics_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="mathematics_examination_score" value="<?php echo $termly_report_data["mathematics_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Christian Religious Studies</td>
        <td><input type="text" name="christian_religious_studies_first_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_second_ca_score" value="<?php echo $termly_report_data["christian_religious_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="christian_religious_studies_examination_score" value="<?php echo $termly_report_data["christian_religious_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Computer Studies</td>
        <td><input type="text" name="computer_studies_first_ca_score" value="<?php echo $termly_report_data["computer_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="computer_studies_second_ca_score" value="<?php echo $termly_report_data["computer_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="computer_studies_examination_score" value="<?php echo $termly_report_data["computer_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>National Values</td>
        <td><input type="text" name="national_values_first_ca_score" value="<?php echo $termly_report_data["national_values_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="national_values_second_ca_score" value="<?php echo $termly_report_data["national_values_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="national_values_examination_score" value="<?php echo $termly_report_data["national_values_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Basic Science & Technology</td>
        <td><input type="text" name="basic_science_and_technology_first_ca_score" value="<?php echo $termly_report_data["basic_science_and_technology_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_and_technology_second_ca_score" value="<?php echo $termly_report_data["basic_science_and_technology_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="basic_science_and_technology_examination_score" value="<?php echo $termly_report_data["basic_science_and_technology_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Pre Vocational Studies</td>
        <td><input type="text" name="pre_vocational_studies_first_ca_score" value="<?php echo $termly_report_data["pre_vocational_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="pre_vocational_studies_second_ca_score" value="<?php echo $termly_report_data["pre_vocational_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="pre_vocational_studies_examination_score" value="<?php echo $termly_report_data["pre_vocational_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>History</td>
        <td><input type="text" name="history_first_ca_score" value="<?php echo $termly_report_data["history_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="history_second_ca_score" value="<?php echo $termly_report_data["history_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="history_examination_score" value="<?php echo $termly_report_data["history_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Business Studies</td>
        <td><input type="text" name="business_studies_first_ca_score" value="<?php echo $termly_report_data["business_studies_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="business_studies_second_ca_score" value="<?php echo $termly_report_data["business_studies_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="business_studies_examination_score" value="<?php echo $termly_report_data["business_studies_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
    <tr>
        <td>Literature</td>
        <td><input type="text" name="literature_first_ca_score" value="<?php echo $termly_report_data["literature_first_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literature_second_ca_score" value="<?php echo $termly_report_data["literature_second_ca_score"] ?>" placeholder="0" class="form-control"></td>
        <td><input type="text" name="literature_examination_score" value="<?php echo $termly_report_data["literature_examination_score"] ?>" placeholder="0" class="form-control"></td>
    </tr>
<?php
}
?>