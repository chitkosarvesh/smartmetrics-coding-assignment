# SuperMetrics CODING ASSIGNMENT

Author : Sarvesh Chitko <chitkosarvesh@gmail.com> 

Written for: SuperMetrics

## Example Output
```json
{
  "average_user_posts_per_month": {
    "user_13": 9,
    "user_3": 9,
    "user_14": 7,
    "user_16": 9,
    "user_19": 6,
    "user_15": 5,
    "user_4": 6,
    "user_6": 6,
    "user_1": 5,
    "user_8": 7,
    "user_9": 6,
    "user_10": 5,
    "user_17": 6,
    "user_7": 7,
    "user_0": 8,
    "user_2": 6,
    "user_18": 7,
    "user_5": 5,
    "user_12": 9,
    "user_11": 6
  },
  "total_posts_split_by_week_number": {
    "2020": {
      "34": 36,
      "35": 38,
      "36": 36,
      "37": 38,
      "38": 40,
      "39": 38,
      "40": 35,
      "41": 37,
      "42": 37,
      "43": 41,
      "44": 40,
      "45": 35,
      "46": 36,
      "47": 39,
      "48": 41,
      "49": 36,
      "50": 36,
      "51": 38,
      "52": 36,
      "53": 21
    },
    "2021": {
      "0": 17,
      "1": 39,
      "2": 36,
      "3": 36,
      "4": 37,
      "5": 36,
      "6": 35,
      "7": 30
    }
  },
  "monthly_stats": {
    "2020": {
      "10": {
        "total_characters": 71178,
        "average_character_length": 423,
        "total_posts": 168,
        "longest_post_by_character_length": 766
      },
      "11": {
        "total_characters": 62508,
        "average_character_length": 385,
        "total_posts": 162,
        "longest_post_by_character_length": 776
      },
      "12": {
        "total_characters": 62703,
        "average_character_length": 387,
        "total_posts": 162,
        "longest_post_by_character_length": 770
      },
      "09": {
        "total_characters": 64914,
        "average_character_length": 398,
        "total_posts": 163,
        "longest_post_by_character_length": 744
      },
      "08": {
        "total_characters": 29554,
        "average_character_length": 374,
        "total_posts": 79,
        "longest_post_by_character_length": 773
      }
    },
    "2021": {
      "02": {
        "total_characters": 37273,
        "average_character_length": 369,
        "total_posts": 101,
        "longest_post_by_character_length": 753
      },
      "01": {
        "total_characters": 60112,
        "average_character_length": 364,
        "total_posts": 165,
        "longest_post_by_character_length": 760
      }
    }
  }
}
```
## Docker Setup
```
docker-compose -f docker-compose.yaml -d up
```
