import java.util.*;

/**
 * Class to solve a number challenge puzzle from codingbat.com/java
 * Used to provide unit testing practice.
 * Borrowed from/inspired by codingbat.com/java
 *
 * @author pwaite
 * @author Elspeth Stalter-Clouse
 */

public class NumberChallenge2 {

    /**
     * Given three ints, number1, number2, and number3, one of them is small, one is medium and one is large.
     * Return true if the three values are evenly spaced, so the difference between small and medium
     * is the same as the difference between medium and large.
     *
     * For example:
     * evenlySpaced(2, 4, 6) → true
     * evenlySpaced(4, 6, 2) → true
     * evenlySpaced(4, 6, 3) → false
     * evenlySpaced(2, 2, 2) → true
     * evenlySpaced(2, 4, 4) → false
     * evenlySpaced(10, 9, 11) → true
	 * evenlySpaced(10, 9, 9) → false
	 * evenlySpaced(2, 2, 4) → false
     *
     * @param number1 first number
     * @param number2 second number
     * @param number3 third number
     * @return indicates whether the input numbers are evenly spaced
     **/

    public boolean evenlySpaced(int number1, int number2, int number3) {

        // This New-And-Improved Code is brought to you by the MAGIC POWER of the mighty ArrayList! :)

        // put the integers into an ArrayList
        ArrayList<Integer> numbers = new ArrayList<Integer>();
        numbers.add(number1);
        numbers.add(number2);
        numbers.add(number3);
        // sort them smallest to largest
        Collections.sort(numbers);

        int difference1 = 0;
        int difference2 = 0;
        int difference3 = 0;

        for (Integer number : numbers) {

            difference1 = Math.abs(numbers.get(0) - numbers.get(1));
            difference2 = Math.abs(numbers.get(0) - numbers.get(2));
            difference3 = Math.abs(numbers.get(1) - numbers.get(2));

            if (difference1 == difference3) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
}
