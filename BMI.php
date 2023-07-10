<php
><!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="BMI.css">
</head>
<body>
    <h1>BMI Calculator</h1>
    <form method="post">
        <label for="weight">Weight (kg):</label>
        <input type="text" name="weight" id="weight" required>
        <br>
        <label for="height">Height (cm):</label>
        <input type="text" name="height" id="height" required>
        <br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = $_POST["weight"];
        $height = $_POST["height"];

        class BMICalculator {
    private $weight;
    private $height;

    public function __construct($weight, $height) {
        $this->weight = $weight;
        $this->height = $height;
    }

    public function calculateBMI() {
        $heightInMeter = $this->height / 100; // แปลงค่าส่วนสูงเป็นเมตร
        $bmi = $this->weight / ($heightInMeter * $heightInMeter); // คำนวณค่า BMI
        return $bmi;
    }

    public function interpretBMI($bmi) {
        if ($bmi < 18.5) {
            return "น้ำหนักน้อย/ผอม";
        } elseif ($bmi >= 18.5 && $bmi < 23) {
            return "ปกติ (สุขภาพดี)";
        } elseif ($bmi >= 23 && $bmi < 25) {
            return "ท้วม";
        } elseif ($bmi >= 25 && $bmi < 30) {
            return "อ้วน";
        } else {
            return "อ้วนมาก/โรคอ้วน";
        }
    }
}



$bmiCalculator = new BMICalculator($weight, $height);
$bmi = $bmiCalculator->calculateBMI();
$bmiCategory = $bmiCalculator->interpretBMI($bmi);

echo "ค่า BMI ของคุณคือ: " . $bmi . "\n";
echo "หมวดหมู่ BMI ของคุณคือ: " . $bmiCategory;


        $bmiCalculator = new BMICalculator($weight, $height);
        $bmi = $bmiCalculator->calculateBMI();
        $bmiCategory = $bmiCalculator->interpretBMI($bmi);

        echo "<h2>Result</h2>";
        echo "Weight: " . $weight . " kg<br>";
        echo "Height: " . $height . " cm<br>";
        echo "BMI: " . $bmi . "<br>";
        echo "Category: " . $bmiCategory;
    }
    ?>
</body>
</html>