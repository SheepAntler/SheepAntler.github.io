/** Thorough unit testing of the NumberChallenge1 class
 *  @author Elspeth Stalter-Clouse
 */

public class TestNumberChallenge1 {


    /** The main method
     *  @param args
     */

    public static void main(String[] args) {

        // TEST CASE 1: 93

        // instantiate the class to be tested
        NumberChallenge1 numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        int inputNumber = 93;

        // create a variable to hold the expected result
        Boolean expectedBoolean = true;

        // create a variable to hold the actual result
        Boolean actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 1 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 93 PASSED!");
        } else {
            System.out.println("The theEnd test for 93 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 2: 90

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = 90;

        // create a variable to hold the expected result
        expectedBoolean = true;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 2 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 90 PASSED!");
        } else {
            System.out.println("The theEnd test for 90 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 3: 89

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = 89;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 3 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 89 PASSED!");
        } else {
            System.out.println("The theEnd test for 89 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 4: -50

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = -50;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 4 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for -50 PASSED!");
        } else {
            System.out.println("The theEnd test for -50 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 5: 290

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = 290;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 5 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 290 PASSED!");
        } else {
            System.out.println("The theEnd test for 290 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 6: -209

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = -209;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 6 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for -209 PASSED!");
        } else {
            System.out.println("The theEnd test for -209 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 7: 0

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = 0;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 7 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 0 PASSED!");
        } else {
            System.out.println("The theEnd test for 0 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }

        // TEST CASE 8: 211

        // instantiate the class to be tested
        numberChallenge1 = new NumberChallenge1();

        // set up conditions necessary for testing
        inputNumber = 211;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge1.nearHundred(inputNumber);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 8 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The nearHundred test for 211 PASSED!");
        } else {
            System.out.println("The theEnd test for 211 FAILED. " + expectedBoolean + " was expected, but " + actualBoolean + " was returned.");
        }
    }
}
