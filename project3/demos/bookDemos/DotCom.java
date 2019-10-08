import java.util.*;

public class DotCom {
    // DotCom's instance variables
    private ArrayList<String> locationCells;
    private String name;

    // A setter method that updates the DotCom's location
    public void setLocationCells(ArrayList<String> loc) {
        locationCells = loc;
    }

    // Your basic setter method
    public void setName(String n) {
        name = n;
    }

    public String checkYourself(String userInput) {
        String result = "miss";
        int index = locationCells.indexOf(userInput);

        if (index >= 0) {
            locationCells.remove(index);

            if (locationCells.isEmpty()) {
                result = "kill";
                System.out.println("Ouch! You sunk the " + name + " : ( ");
            } else {
                result = "hit";
            } // close if
        } // close if
        return result;
    } // close method
} // close class
