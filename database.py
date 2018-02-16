from __future__ import print_function
from peewee import *
import json
from googleplaces import GooglePlaces, types, lang
import pprint
import binascii, os

db = MySQLDatabase('padernew_crawl', user='root')
class BaseModel(Model):
	class Meta:
		database = db

class Location(BaseModel):
	name = CharField()
	address = CharField()
	phone = CharField(null = True)
	email = CharField(null = True)
	token = CharField()
	lat = CharField(null = True)
	lng = CharField(null = True)
	category = CharField(null = True)
	website = CharField(null = True)
	maps_url = CharField()
class Days(BaseModel):
	name= CharField()
class OpeningHours(BaseModel):
	location = ForeignKeyField(Location)
	day = ForeignKeyField(Days, related_name='day')
	opened = CharField(null = True)
	closed = CharField(null = True)
class Reservation(BaseModel):
	location = ForeignKeyField(Location)
	date = DateField()
	canceld = BooleanField(default=False)	
class Photos(BaseModel):
	location = ForeignKeyField(Location)
	photo_name = CharField()
	photo_url = CharField()	

db.connect()
db.drop_tables([Location, Days, OpeningHours, Reservation, Photos])
db.create_tables([Location, Days, OpeningHours, Reservation, Photos])

Days.create(name='Sonntag')
Days.create(name='Montag')
Days.create(name='Dienstag')
Days.create(name='Mittwoch')
Days.create(name='Donnerstag')
Days.create(name='Freitag')
Days.create(name='Samstag')

# api_key = 'AIzaSyAJ4-7cvzD1FXN2JisaRlTdF3RzfXRUE7o'
api_key = 'AIzaSyCOUNC03eGdEIlkOU6xDHoLeL1E-qb1qg8'
# api_key = 'AIzaSyA_H7Lw-Byirg-V57N1_rJoZWXOZVMezu8'
api_key = 'AIzaSyBL3A20ySkk0xtyaH8i8nYem1sqii6AbRc'
# api_key = 'AIzaSyD50USv0DdzAN_W2f9vt_h2NaNyTvCByAE'

google_places = GooglePlaces(api_key)
i = 1
def searchIt(searchKey):
	# around paderbor
	query_result = google_places.radar_search(lat_lng={'lat': 51.71905, 'lng': 8.75439}, keyword=searchKey, radius=1000)
	# id Counter i
	global i
	for place in query_result.places:
		# make a random token - for verification
		print (i)
		token = binascii.hexlify(os.urandom(20))
		place.get_details()
		outputJson = place.details
		lat = str(outputJson['geometry']['location']['lat'])
		lng = str(outputJson['geometry']['location']['lng'])
		Location.create(name=place.name, address=place.formatted_address, phone=place.international_phone_number, email="", lat=lat, lng=lng, token=token, website=place.website, maps_url=place.url, category=searchKey)
		if 'opening_hours' in str(outputJson):
			for period in outputJson['opening_hours']['periods']:
				# periods/close/day/time
				# periods/open/day/time
				cday = period['close']['day']+1
				ctime = period['close']['time']
				oday = period['open']['day']+1
				otime = period['open']['time']
				if cday == oday:
					OpeningHours.create(location_id = i, day_id = cday, closed = ctime, opened = otime)
				else:
					OpeningHours.create(location_id = i, day_id = oday, closed = "" , opened = otime)
					OpeningHours.create(location_id = i, day_id = cday, closed = ctime, opened = "")

	
		for photo in place.photos:
			j = 1
			photo.get(maxheight=500, maxwidth=500)
			Photos.create(location_id=i,photo_name="%s-%d" % (place.name,j),photo_url=photo.url)
			j = j + 1 
		i = i + 1 

searchIt("bar")
searchIt("coffee")
searchIt("cafe")
searchIt("pizza")
searchIt("doener")
searchIt("eis")
searchIt("imbiss")
searchIt("restaurant")


