/**
 * Provides a way to test out each method of the MethodPractice class
 *
 * @author Elspeth Stalter-Clouse
 */
public class MethodPracticeTestDrive {
    /**
     * Instantiate a MethodPractice object
	 * Call the various mehtods on MethodPractice to demonstrate that each one functions correctly
     *
     * @param args command line arguments (not used in this case)
     */

	public static void main(String[] args) {

		// Instantiate a MethodPractice object
		MethodPractice practice = new MethodPractice();

		// 1. Test the CalculateDifferenceFromTen method

		// Create a variable for the input number
		int inputInt = 4;

		// Create a variable for the expected returned value
		int expectedValue = 6;

		// Write out a little information about the method to be called
		System.out.println();
		System.out.println("********* Calling CalculateDifferenceFromTen: *********");
		System.out.println("          Input: " + inputInt);
		System.out.println("          Expected output: " + expectedValue);

		// Call the method
		int actualDifference = practice.calculateDifferenceFromTen(inputInt);
		System.out.println("          The actual returned value is: " + actualDifference);

		// Write out a blank line to separate the "tests"
		System.out.println();

		// 2. Test the concatenateTwoStrings method

        // Create two strings as the input strings
        String inputStringOne = "Narwhals, narwhals, swimming in the ocean; ";
        String inputStringTwo = "causing a commotion because they are so awesome.";

        // Create a variable for the expected returned value
        String expectedResult = "Narwhals, narwhals, swimming in the ocean; "
                + "causing a commotion because they are so awesome.";

        // Write out a little information about the method to be called
        System.out.println("********* Calling concatenateTwoStrings: *********");
        System.out.println("          First String: " + inputStringOne);
        System.out.println("          Second String: " + inputStringTwo);
        System.out.println("          Expected Output: " + expectedResult);

        // Call the method
        String concatenatedStrings = practice.concatenateTwoStrings(inputStringOne, inputStringTwo);
        System.out.println("          Actual concatenated Strings: " + concatenatedStrings);

        // Write out a blank line to separate the "tests"
        System.out.println();

        // 3. Test the calculateWithTwoLongs method

        // Create two longs as the input longs
        long inputLongOne = 2546789;
        long inputLongTwo = 123456789;

        // Create a variable for the expected returned value
        long expectedReturn = 148924679;

        // Write out a little information about the method to be called
        System.out.println("********* Calling calculateWithTwoLongs: *********");
        System.out.println("          First long: " + inputLongOne);
        System.out.println("          Second long: " + inputLongTwo);
        System.out.println("          Expected Output: " + expectedReturn);

        // Call the method
        long greatBigLongResult = practice.calculateWithTwoLongs(inputLongOne, inputLongTwo);
        System.out.println("          Actual long calculation: " + greatBigLongResult);

        // Write out a blank line to separate the "tests"
        System.out.println();

        // 4. Test the analyzeTwoBooleans method

        // Create two booleans set to true
        boolean inputBooleanOne = true;
        boolean inputBooleanTwo = true;

        // Create a variable for the expected returned value
        String expectedMessage = "It's all good.";

        // Write out a little information about the method to be called
        System.out.println("********* Calling analyzeTwoBooleans: *********");
        System.out.println("          The first boolean is " + inputBooleanOne);
        System.out.println("          The second boolean is " + inputBooleanTwo + ", too");
        System.out.println("          SO, the expected message is: " + expectedMessage);
		System.out.println("          The REAL output message is: ");

        // Call the method
		practice.analyzeTwoBooleans(inputBooleanOne, inputBooleanTwo);

        // Write out a blank line to separate the "tests"
		System.out.println();

		// 5. Test the calculateWithTwoFloats method

		// Create two floats
		float inputFloatOne = 56.5f;
		float inputFloatTwo = 2.4f;

		// Create a variable for the expected returned value
		double expectedProduct = 135.6;

		// Write out a little information about the method to be called
		System.out.println("********* Calling calculateWithTwoFloats: *********");
		System.out.println("          The first float is: " + inputFloatOne);
		System.out.println("          The second float is: " + inputFloatTwo);
		System.out.println("          The expected product of these floats cast "
				+ "to a double is: " + expectedProduct);

		// Call the method
		double castDouble = practice.calculateWithTwoFloats(inputFloatOne, inputFloatTwo);
		System.out.println("          The actual UNFORMATTED product of the two"
				+ " floats cast to a double is: " + castDouble);

		// Write out a blank line to separate the "tests"
		System.out.println();

		// 6. Test the divideDoubles method

		// Create a double to be the dividend
		double dividend = 55.83;

		// Create a variable for the expected returned value
		double expectedQuotient = 16.7657657658;

		// Write out a little information about the method to be called
		System.out.println("********* Calling divideDoubles: *********");
		System.out.println("          The dividend is: " + dividend);
		System.out.println("          The expected quotient is: " + expectedQuotient);

		// Call the method
		double quotient = practice.divideDoubles(dividend);
		System.out.println("          The actual UNFORMATTED quotient is: " + quotient);

	}
}
