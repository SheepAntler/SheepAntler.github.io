import java.util.*;

/** This class will thoroughly test the NumberChallenge3 class
 *  @author Elspeth Stalter-Clouse
 */

public class TestNumberChallenge3 {


    /** The main method!
     *  @param args
     */

    public static void main(String[] args) {

        // TEST CASE 1: [1, 2, 3, 4]

        // intantiate the class to be tested
        NumberChallenge3 numberChallenge3 = new NumberChallenge3();

        // set up conditions necessary for testing
        int[] inputArray = new int[] {1, 2, 3, 4};

        // create a variable to hold the expected result
        int[] expectedOutput = new int[] {4, 3, 2, 1};

        // create a variable to hold the acutal result
        int[] actualOutput = new int[] {};

        // run the method to be tested and assign the result to the actual variable
        actualOutput = numberChallenge3.reverse(inputArray);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 1 ******");
        System.out.println();

        if (Arrays.equals(expectedOutput, actualOutput)) {
            System.out.println("The reverse test for [1, 2, 3, 4] PASSED!");
        } else {
            System.out.println("The reverse test for [1, 2, 3, 4] FAILED. "
                    + Arrays.toString(expectedOutput) + " was expected, but "
                    + Arrays.toString(actualOutput) + " was returned.");
        }

        // TEST CASE 2: [5, 11, 9]

        // intantiate the class to be tested
        numberChallenge3 = new NumberChallenge3();

        // set up conditions necessary for testing
        inputArray = new int[] {5, 11, 9};

        // create a variable to hold the expected result
        expectedOutput = new int[] {9, 11, 5};

        // create an array to hold the acutal result
        actualOutput = new int[] {};

        // run the method to be tested and assign the result to the actual variable
        actualOutput = numberChallenge3.reverse(inputArray);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 2 ******");
        System.out.println();

        if (Arrays.equals(expectedOutput, actualOutput)) {
            System.out.println("The reverse test for [5, 11, 9] PASSED!");
        } else {
            System.out.println("The reverse test for [5, 11, 9] FAILED. "
                    + Arrays.toString(expectedOutput) + " was expected, but "
                    + Arrays.toString(actualOutput) + " was returned.");
        }

        // TEST CASE 3: [7, 0, 0, 8, 9]

        // intantiate the class to be tested
        numberChallenge3 = new NumberChallenge3();

        // set up conditions necessary for testing
        inputArray = new int[] {7, 0, 0, 8, 9};

        // create a variable to hold the expected result
        expectedOutput = new int[] {9, 8, 0, 0, 7};

        // create an array to hold the acutal result
        actualOutput = new int[] {};

        // run the method to be tested and assign the result to the actual variable
        actualOutput = numberChallenge3.reverse(inputArray);

        // verify the result and ouput an appropriate message indicating the condition tested and "success" or "fail"
        System.out.println();
        System.out.println("******  Case 3 ******");
        System.out.println();

        if (Arrays.equals(expectedOutput, actualOutput)) {
            System.out.println("The reverse test for [7, 0, 0, 8, 9] PASSED!");
        } else {
            System.out.println("The reverse test for [7, 0, 0, 8, 9] FAILED. "
                    + Arrays.toString(expectedOutput) + " was expected, but "
                    + Arrays.toString(actualOutput) + " was returned.");
        }

    }

}
