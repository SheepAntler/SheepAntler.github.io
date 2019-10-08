import java.util.*;

/**
 * Class to solve a number challenge puzzle from codingbat.com/java
 * Used to provide unit testing practice.
 * Borrowed from/inspired by codingbat.com/java
 *
 * @author pwaite
 * @author Elspeth Stalter-Clouse
 */

public class NumberChallenge3 {


    /**
     * Given an array of ints, return a new array with the elements in reverse order, so {1, 2, 3} becomes {3, 2, 1}.
     * <p>
     * For example:
     * reverse([1, 2, 3, 4]) → [4, 3, 2, 1]
     * reverse([5, 11, 9]) → [9, 11, 5]
     * reverse([7, 0, 0, 8, 9]) → [9, 8, 0, 0, 7]
     *
     * @param numbers the array of numbers to reverse
     * @return reverse of input array
     **/

    public int[] reverse(int[] numbers) {

        // create an ArrayList to re-sort the numbers
        ArrayList<Integer> reverseNumbersArrayList = new ArrayList<Integer>();

        for (int counter = numbers.length - 1; counter >= 0; counter--) {
            reverseNumbersArrayList.add(numbers[counter]);
        }

        // now, make that ArrayList primitive so the types match
        int[] reverseNumbersArray = new int[reverseNumbersArrayList.size()];

        // add number into the new int[] array, until all numbers are returned
        for (int counter = 0; counter < reverseNumbersArrayList.size(); counter ++) {
            if (reverseNumbersArrayList.get(counter) != null) {
                reverseNumbersArray[counter] = reverseNumbersArrayList.get(counter);
            }
        }

        return reverseNumbersArray;
    }
}
