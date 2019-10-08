/** This is the test code for the Client class.
 *  It will instantiate a Client object and test every calculation within it,
 *  including all possible if/else intput and output for each method in the class
 *
 *  @author Elspeth Stalter-Clouse
 */
public class LawnAThonTester {
    /** Here is the main method
     *  @param args
     */
    public static void main(String[] args) {
        // Instantiate a Client object
        Client testClient = new Client();

        // =================================
        // TEST THE calculateLawnArea METHOD
        // =================================

        // set some test values
        double testLength = 12.6;
        double testWidth = 14;

        // pass the test values into the class
        testClient.setLawnLength(testLength);
        testClient.setLawnWidth(testWidth);

        // output expected/actual calculations
        System.out.println();
        System.out.println("Testing calculateLawnArea()");
        System.out.println();
        System.out.println("Lawn Length: " + testClient.getLawnLength());
        System.out.println("Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Lawn Area: "
                + String.format("%.1f", (testLength * testWidth)));
        System.out.println("Calculated Lawn Area:"
                + String.format("%.1f", testClient.calculateLawnArea()));

        // =====================================
        // TEST THE calculateSeasonCharge METHOD
        // =====================================

        // set test values for a small lawn
        double smallLengthTest = 15;
        double smallWidthTest = 10.2;

        // pass the values into the class
        testClient.setLawnLength(smallLengthTest);
        testClient.setLawnWidth(smallWidthTest);

        // output expected/actual calculations
        System.out.println();
        System.out.println("Testing calculateSeasonCharge() for a small lawn");
        System.out.println();
        System.out.println("Small Lawn Length: " + testClient.getLawnLength());
        System.out.println("Small Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Season Charge: $"
                + (testClient.SEASON_LENGTH * testClient.SMALL_LAWN_RATE));
        System.out.println("Actual Season Charge: $"
                + String.format("%,.2f", testClient.calculateSeasonCharge()));

        // set test values for a medium lawn
        double mediumLengthTest = 24.75;
        double mediumWidthTest = 27;

        // pass the values into the class
        testClient.setLawnLength(mediumLengthTest);
        testClient.setLawnWidth(mediumWidthTest);

        // output expected/actual calculations
        System.out.println();
        System.out.println("Testing calculateSeasonCharge() for a medium lawn");
        System.out.println();
        System.out.println("Medium Lawn Length: " + testClient.getLawnLength());
        System.out.println("Medium Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Season Charge: $"
                + (testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE));
        System.out.println("Actual Season Charge: $"
                + String.format("%,.2f", testClient.calculateSeasonCharge()));


        // set test values for a medium lawn
        double largeLengthTest = 55.2;
        double largeWidthTest = 79;

        // pass the values into the class
        testClient.setLawnLength(largeLengthTest);
        testClient.setLawnWidth(largeWidthTest);

        // output expected/actual calculations
        System.out.println();
        System.out.println("Testing calculateSeasonCharge() for a large lawn");
        System.out.println();
        System.out.println("Large Lawn Length: " + testClient.getLawnLength());
        System.out.println("Large Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Season Charge: $"
                + (testClient.SEASON_LENGTH * testClient.LARGE_LAWN_RATE));
        System.out.println("Actual Season Charge: $"
                + String.format("%,.2f", testClient.calculateSeasonCharge()));

        // ======================================
        // TEST THE calculateServiceCharge METHOD
        // ======================================

        // set some test values for a lawn
        double seasonLengthTest = 29;
        double seasonWidthTest = 25;

        // pass the values into the class
        testClient.setLawnLength(seasonLengthTest);
        testClient.setLawnWidth(seasonWidthTest);

        // set the payment type to "SINGLE"
        testClient.setPaymentPlan(1);

        // output expected/actual calculations for a single payment
        System.out.println();
        System.out.println("Testing calculateServiceCharge() for a single payment");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Service Charge: $"
                + (testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE));
        System.out.println("Actual Season Charge: $"
                + String.format("%.2f", testClient.calculateServiceCharge()));

        // set the payment type to "DOUBLE"
        testClient.setPaymentPlan(2);

        // output expected/actual calculations for two payments
        System.out.println();
        System.out.println("Testing calculateServiceCharge() for two payments");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Service Charge: $"
                + (((testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE) / 2)
                + testClient.TWO_SERVICE_CHARGE));
        System.out.println("Actual Season Charge: $"
                + String.format("%.2f", testClient.calculateServiceCharge()));

        // set the payment type to "WEEKLY"
        testClient.setPaymentPlan(22);

        // output expected/actual calculations for a weekly payments
        System.out.println();
        System.out.println("Testing calculateServiceCharge() for weekly payments");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Service Charge: $"
                + (((testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE) / 22)
                + testClient.TWENTY_TWO_SERVICE_CHARGE));
        System.out.println("Actual Season Charge: $"
                + String.format("%.2f", testClient.calculateServiceCharge()));

        // ====================================
        // TEST THE calculateTotalCost() METHOD
        // ====================================

        // set some test values for a lawn
        double totalCostLength = 29;
        double totalCostWidth = 25;

        // pass the values into the class
        testClient.setLawnLength(seasonLengthTest);
        testClient.setLawnWidth(seasonWidthTest);

        // set the payment type to "SINGLE"
        testClient.setPaymentPlan(1);

        // output expected/actual calculations for a single payment
        System.out.println();
        System.out.println("Testing calculateTotalCost() for a single payment");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Total Cost: $"
                + (testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE));
        System.out.println("Actual Total Cost: $"
                + String.format("%.2f", testClient.calculateTotalCost()));

        // set the payment type to "DOUBLE"
        testClient.setPaymentPlan(2);

        // output expected/actual calculations for a single payment
        System.out.println();
        System.out.println("Testing calculateTotalCost() for two payments");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Total Cost: $"
                + ((((testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE) / 2)
                + testClient.TWO_SERVICE_CHARGE) * testClient.DOUBLE_PAYMENTS));
        System.out.println("Actual Total Cost: $"
                + String.format("%.2f", testClient.calculateTotalCost()));

        // set the payment type to "DOUBLE"
        testClient.setPaymentPlan(22);

        // output expected/actual calculations for a single payment
        System.out.println();
        System.out.println("Testing calculateTotalCost() for two payments");
        System.out.println();
        System.out.println("Test Lawn Length: " + testClient.getLawnLength());
        System.out.println("Test Lawn Width: " + testClient.getLawnWidth());
        System.out.println("Expected Total Cost: $"
                + ((((testClient.SEASON_LENGTH * testClient.MEDIUM_LAWN_RATE) / 22)
                + testClient.TWENTY_TWO_SERVICE_CHARGE) * testClient.SEASON_LENGTH));
        System.out.println("Actual Total Cost: $"
                + String.format("%.2f", testClient.calculateTotalCost()));

    }
}
