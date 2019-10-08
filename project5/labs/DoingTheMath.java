// package it up!
package java111.project5.labs;

// import!
import java.lang.Math;
import java.util.*;

/** This class contains a main method that will run some Math calculations
 *  using the Math class and its methods from the java API
 *
 *  @author Elspeth Stalter-Clouse
 */
public class DoingTheMath {
    /** Here's the main method
     *  @param args the command line arguments
     */
    public static void main(String[] args) {

        System.out.println();

        // find a random number between 1 and 1000
        int upperLimit = 1000;
        int lowerLimit = 1;
        int randomNumber = (int) (Math.random() * upperLimit + lowerLimit);
        System.out.println("Here is a random number between " + lowerLimit
                + " and " + upperLimit + ": " + randomNumber);

        System.out.println();

        // find the square root of several numbers
        int smallNumber = 45;
        int largeNumber = 8975;
        double decimalNumber = 706.25;
        double smallSquareRoot = (double) Math.sqrt(smallNumber);
        double largeSquareRoot = (double) Math.sqrt(largeNumber);
        double decimalSquareRoot = Math.sqrt(decimalNumber);
        System.out.println("Square root of the number " + smallNumber + ": "
                + String.format("%.2f", smallSquareRoot));
        System.out.println("Square root of the number " + largeNumber + ": "
                + String.format("%.2f", largeSquareRoot));
        System.out.println("Square root of the decimal " + decimalNumber + ": "
                + String.format("%.2f", decimalSquareRoot));

        System.out.println();

        // round several numbers
        float float1 = 799.2f;
        double double1 = 58.76;
        float float2 = 46.595f;
        double double2 = 12.362;

        double roundedFloat2 = Math.round(float2 * 10.0) / 10.0;
        double roundedDouble2 = Math.round(double2 * 10.0) / 10.0;

        // nearest int:
        System.out.println("The float " + float1 + " rounded to the nearest int: "
                + Math.round(float1));
        System.out.println("The double " + double1 + " rounded to the nearest int: "
                + Math.round(double1));

        // nearest tenth:
        System.out.println("The float " + float2 + " rounded to the nearest tenth: "
                + roundedFloat2);
        System.out.println("The double " + double2 + " rounded to the nearest tenth: "
                + roundedDouble2);

        System.out.println();

        // find the result of PI * 21
        int piMultiplier = 21;
        double piMath = Math.PI * piMultiplier;
        System.out.println("Pi * " + piMultiplier + " is: " + piMath);

        System.out.println();
    }
}
