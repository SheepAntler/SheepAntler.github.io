/** Thorough unit testing of the NumberChallenge2 class
 *  @author Elspeth Stalter-Clouse
 */

public class TestNumberChallenge2 {


    /** The main method
     *  @param args
     */

    public static void main(String[] args) {

        // TEST CASE 1: 2, 4, 6

        // instantiate the class to be tested
        NumberChallenge2 numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        int inputNumber1 = 2;
        int inputNumber2 = 4;
        int inputNumber3 = 6;

        // create a variable to hold the expected result
        Boolean expectedBoolean = true;

        // create a variable to hold the actual result
        Boolean actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 1 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 2, 4, 6 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 2, 4, 6 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 2: 4, 6, 2

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 4;
        inputNumber2 = 6;
        inputNumber3 = 2;

        // create a variable to hold the expected result
        expectedBoolean = true;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 2 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 4, 6, 2 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 4, 6, 2 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 3: 4, 6, 3

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 4;
        inputNumber2 = 6;
        inputNumber3 = 3;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 3 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 4, 6, 3 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 4, 6, 3 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 4: 2, 2, 2

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 2;
        inputNumber2 = 2;
        inputNumber3 = 2;

        // create a variable to hold the expected result
        expectedBoolean = true;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 4 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 2, 2, 2 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 2, 2, 2 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 5: 2, 4, 4

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 2;
        inputNumber2 = 4;
        inputNumber3 = 4;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 5 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 2, 4, 4 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 2, 4, 4 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 6: 10, 9, 11

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 10;
        inputNumber2 = 9;
        inputNumber3 = 11;

        // create a variable to hold the expected result
        expectedBoolean = true;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 6 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 10, 9, 11 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 10, 9, 11 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 7: 10, 9, 9

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 10;
        inputNumber2 = 9;
        inputNumber3 = 9;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 7 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 10, 9, 9 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 10, 9, 9 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

        // TEST CASE 8: 2, 2, 4

        // instantiate the class to be tested
        numberChallenge2 = new NumberChallenge2();

        // set up conditions necessary for testing
        inputNumber1 = 2;
        inputNumber2 = 2;
        inputNumber3 = 4;

        // create a variable to hold the expected result
        expectedBoolean = false;

        // create a variable to hold the actual result
        actualBoolean = null;

        // run the method to be tested and assign the result to the actual result variable
        actualBoolean = numberChallenge2.evenlySpaced(inputNumber1, inputNumber2, inputNumber3);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 8 ******");
        System.out.println();

        if (expectedBoolean.equals(actualBoolean)) {
            System.out.println("The evenlySpaced test for 2, 2, 4 PASSED!");
        } else {
            System.out.println("The evenlySpaced test for 2, 2, 4 FAILED. "
                    + expectedBoolean + " was expected, but "
                    + actualBoolean + " was returned.");
        }

    }

}
