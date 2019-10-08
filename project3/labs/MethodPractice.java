/**
 * MethodPractice class which will provide practice creating methods with various parameters and return types.
 * This class was created for the in-class mini-team challenge in week 5
 *
 * @author Elspeth Stalter-Clouse
 */

public class MethodPractice {

	/**
     *  Takes 1 int as a parameter and returns the difference between 10 and the number.
	 *
     * @param inputNumber the number to subract from 10
     * @return result of subtracting the input number from 10.
     **/

    public int calculateDifferenceFromTen(int inputNumber) {
		int differenceNumber = 10;
		return Math.abs(differenceNumber - inputNumber);
    }

    /**
     *  Takes 2 String parameters and returns their concatenated value.
     *
     * @param stringOne, stringTwo
     * @return concatenated strings
     */

    public String concatenateTwoStrings(String stringOne, String stringTwo) {
        return (stringOne + stringTwo);
    }

    /**
     *  Takes 2 longs and returns 10 times the first number plus the second number.
     *
     *  @param longOne, longTwo
     *  @return 10x longOne + longTwo
     */

    public long calculateWithTwoLongs(long longOne, long longTwo) {
        int longOneMultiplier = 10;
        return (longOne * longOneMultiplier) + longTwo;
    }

    /**
     *  Takes 2 booleans and has a void return type. If both booleans are true,
     *  output the message, "It's all good." This message will be generated
     *  here in the MethodPractice class, because it occurs in an if statement.
     *
     * @param booleanOne, booleanTwo
     */

    public void analyzeTwoBooleans(boolean booleanOne, boolean booleanTwo) {
        if (booleanOne == true && booleanTwo == true) {
            System.out.println("          It's all good.");
        }
    }

    /**
     *  Takes 2 floats and returns a double that is their product.
     *
     *  @param floatOne, floatTwo
     *  @return (double) product
     */
    public double calculateWithTwoFloats(float floatOne, float floatTwo) {
        return (double) floatOne * floatTwo;
    }

    /**
     *  Takes 1 double and returns its value divided by 3.33.
     *  @param inputDouble
     *  @return inputDouble quotient value
     */
    public double divideDoubles (double inputDouble) {
        double divisor = 3.33;
        return inputDouble / divisor;
    }

}
