/** Thorough unit testing for the SubStringPractice class
 *  @author Elspeth Stalter-Clouse
 */


public class TestSubStringPractice {

    /** The main method
     *  @param args
     */

    public static void main(String[] args) {

        // TEST CASE 1: "Hello", true

        // instantiate the class to be tested
        SubStringPractice subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        String inputString = "Hello";
        boolean inputBoolean = true;

        // create a variable to hold the expected result
        String expectedSubString = "H";

        // create a variable to hold the actual result
        String actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 1 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"Hello\", true PASSED!");
        } else {
            System.out.println("The theEnd test for \"Hello\", true FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

        // TEST CASE 2: "Hello", false

        // instantiate the class to be tested
        subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        inputString = "Hello";
        inputBoolean = false;

        // create a variable to hold the expected result
        expectedSubString = "o";

        // create a variable to hold the actual result
        actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 2 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"Hello\", false PASSED!");
        } else {
            System.out.println("The theEnd test for \"Hello\", false FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

        // TEST CASE 3: "oh", true

        // instantiate the class to be tested
        subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        inputString = "oh";
        inputBoolean = true;

        // create a variable to hold the expected result
        expectedSubString = "o";

        // create a variable to hold the actual result
        actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 3 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"oh\", true PASSED!");
        } else {
            System.out.println("The theEnd test for \"oh\", true FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

        // TEST CASE 4: "x", true

        // instantiate the class to be tested
        subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        inputString = "x";
        inputBoolean = true;

        // create a variable to hold the expected result
        expectedSubString = "x";

        // create a variable to hold the actual result
        actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 4 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"x\", true PASSED!");
        } else {
            System.out.println("The theEnd test for \"x\", true FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

        // TEST CASE 5: "x", false

        // instantiate the class to be tested
        subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        inputString = "x";
        inputBoolean = false;

        // create a variable to hold the expected result
        expectedSubString = "x";

        // create a variable to hold the actual result
        actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 5 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"x\", false PASSED!");
        } else {
            System.out.println("The theEnd test for \"x\", false FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

        // TEST CASE 6: "1234", true

        // instantiate the class to be tested
        subStringPractice = new SubStringPractice();

        // set up conditions necessary for testing
        inputString = "1234";
        inputBoolean = true;

        // create a variable to hold the expected result
        expectedSubString = "1";

        // create a variable to hold the actual result
        actualSubString = null;

        // run the method to be tested and assign the result to the actual result variable
        actualSubString = subStringPractice.theEnd(inputString, inputBoolean);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 6 ******");
        System.out.println();

        if (expectedSubString.equals(actualSubString)) {
            System.out.println("The theEnd test for \"1234\", true PASSED!");
        } else {
            System.out.println("The theEnd test for \"1234\", true FAILED. " + expectedSubString + " was expected, but " + actualSubString + " was returned.");
        }

    }
}
